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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề bài viết
            $table->string('short_description')->nullable(); // Mô tả ngắn
            $table->text('content'); // Nội dung bài viết
            $table->string('author'); // Tác giả
            $table->string('featured_image')->nullable();  // Đường dẫn ảnh bìa (kiểu string thay vì text)
            $table->string('image_in_content')->nullable(); // Đường dẫn ảnh trong nội dung (kiểu string thay vì text)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
