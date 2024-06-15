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
        Schema::create('produks_categorys', function (Blueprint $table) {
            $table->foreignUuid('produks_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreignUuid('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->primary(['produks_id', 'categories_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks_categorys');
    }
};
