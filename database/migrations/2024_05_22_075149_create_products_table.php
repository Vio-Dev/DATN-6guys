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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2); // Kiểu số thập phân cho giá
            $table->unsignedBigInteger('category_id');
            $table->text('content');
            $table->text('image'); // Để lưu nhiều ảnh dạng JSON
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->timestamps();
        
            $table->foreign('category_id')->references('id')->on('categories');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
