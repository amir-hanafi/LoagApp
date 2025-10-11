<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class JsonAuthenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            abort(response()->json([
                'message' => 'Unauthorized',
            ], 401));
        }

        return null;
    }
}
