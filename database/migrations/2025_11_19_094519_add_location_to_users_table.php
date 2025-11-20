<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // CEK dulu kolom sebelum menambah
            if (!Schema::hasColumn('users', 'province_id')) {
                $table->unsignedBigInteger('province_id')->nullable()->after('password');
                $table->foreign('province_id')->references('id')->on('provinces')->nullOnDelete();
            }

            if (!Schema::hasColumn('users', 'city_id')) {
                $table->unsignedBigInteger('city_id')->nullable()->after('province_id');
                $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            }

            if (!Schema::hasColumn('users', 'district_id')) {
                $table->unsignedBigInteger('district_id')->nullable()->after('city_id');
                $table->foreign('district_id')->references('id')->on('districts')->nullOnDelete();
            }

            if (!Schema::hasColumn('users', 'village_id')) {
                $table->unsignedBigInteger('village_id')->nullable()->after('district_id');
                $table->foreign('village_id')->references('id')->on('villages')->nullOnDelete();
            }

            if (!Schema::hasColumn('users', 'latitude')) {
                $table->decimal('latitude', 10, 7)->nullable();
            }

            if (!Schema::hasColumn('users', 'longitude')) {
                $table->decimal('longitude', 10, 7)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'province_id')) {
                $table->dropForeign(['province_id']);
                $table->dropColumn('province_id');
            }

            if (Schema::hasColumn('users', 'city_id')) {
                $table->dropForeign(['city_id']);
                $table->dropColumn('city_id');
            }

            if (Schema::hasColumn('users', 'district_id')) {
                $table->dropForeign(['district_id']);
                $table->dropColumn('district_id');
            }

            if (Schema::hasColumn('users', 'village_id')) {
                $table->dropForeign(['village_id']);
                $table->dropColumn('village_id');
            }

            if (Schema::hasColumn('users', 'latitude')) {
                $table->dropColumn('latitude');
            }

            if (Schema::hasColumn('users', 'longitude')) {
                $table->dropColumn('longitude');
            }
        });
    }
};
