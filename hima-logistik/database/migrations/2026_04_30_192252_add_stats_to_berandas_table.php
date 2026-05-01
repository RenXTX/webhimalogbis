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
        Schema::table('berandas', function (Blueprint $table) {
            $table->string('stat_anggota')->nullable()->default('200');
            $table->string('stat_kegiatan')->nullable()->default('50');
            $table->string('stat_divisi')->nullable()->default('10');
            $table->string('stat_periode')->nullable()->default('2025');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berandas', function (Blueprint $table) {
            $table->dropColumn(['stat_anggota', 'stat_kegiatan', 'stat_divisi', 'stat_periode']);
        });
    }
};
