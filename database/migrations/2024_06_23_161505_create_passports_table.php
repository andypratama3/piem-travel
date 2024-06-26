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
        Schema::create('passports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('surat_kawin')->nullable();
            $table->string('passport')->nullable();
            $table->foreignUuid('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passports');
    }
};
