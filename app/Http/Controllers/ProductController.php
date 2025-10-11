<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Tambah produk baru (API).
     * Require auth:sanctum — pastikan route berada di group auth.
     */
    public function addProduct(Request $request)
    {
        // pastikan user terautentikasi
        if (! $request->user()) {
            return response()->json(['message' => 'Unauthorized. Login required.'], 401);
        }

        // validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $imagePath = null;

            if ($request->hasFile('image')) {
                // simpan di storage/app/public/products dan kembalikan path seperti "products/xxx.jpg"
                $imagePath = $request->file('image')->store('products', 'public');
            }

            $product = Product::create([
                'user_id' => $request->user()->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $imagePath,
            ]);

            // tambahkan image_url agar frontend langsung dapat menampilkannya
            $product->image_url = $product->image ? asset('storage/' . $product->image) : null;

            return response()->json([
                'message' => 'Produk berhasil diunggah',
                'product' => $product
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat tambah produk: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'Terjadi kesalahan server saat menambah produk'], 500);
        }
    }

    /**
     * Ambil semua produk (API).
     * Mengembalikan produk + data user (id, name) dan image_url.
     */
    public function index()
    {
        $products = Product::with('user')->latest()->get()->map(function ($p) {
            $p->image_url = $p->image ? asset('storage/' . $p->image) : null;
            // minimalkan data user yang dikembalikan
            if ($p->relationLoaded('user') && $p->user) {
                $p->owner = [
                    'id' => $p->user->id,
                    'name' => $p->user->name,
                ];
            } else {
                $p->owner = null;
            }
            unset($p->user); // hapus relasi full user kalau tidak perlu
            return $p;
        });

        return response()->json([
            'message' => 'Daftar produk',
            'products' => $products
        ]);
    }

    /**
     * Tampilkan preview produk di browser (Blade).
     * Route web: /products (lihat routes/web.php)
     */
    public function viewProducts()
    {
        $products = Product::with('user')->latest()->get();

        // Pastikan setiap product punya field image_url sebelum view
        $products->transform(function ($p) {
            $p->image_url = $p->image ? asset('storage/' . $p->image) : null;
            return $p;
        });

        return view('products', compact('products'));
    }

    /**
     * Optional: lihat detail produk (API)
     */
    public function show($id)
    {
        $p = Product::with('user')->findOrFail($id);
        $p->image_url = $p->image ? asset('storage/' . $p->image) : null;
        $p->owner = $p->user ? ['id' => $p->user->id, 'name' => $p->user->name] : null;
        unset($p->user);

        return response()->json($p);
    }
}
