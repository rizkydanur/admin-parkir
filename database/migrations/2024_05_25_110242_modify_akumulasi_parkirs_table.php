<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('akumulasi_parkirs', function (Blueprint $table) {
            // Drop columns kendaraan_masuk dan kendaraan_keluar
            $table->dropColumn(['kendaraan_masuk', 'kendaraan_keluar']);

            // Add new column total_kendaraan
            $table->integer('total_kendaraan')->after('id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('akumulasi_parkirs', function (Blueprint $table) {
            // Re-add columns kendaraan_masuk dan kendaraan_keluar
            $table->integer('kendaraan_masuk')->default(0);
            $table->integer('kendaraan_keluar')->default(0);

            // Drop column total_kendaraan
            $table->dropColumn('total_kendaraan');
        });
    }
};
