<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_returns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();  // Liên kết với đơn hàng
            $table->text('reason');  // Lý do đổi trả
            $table->string('image')->nullable();  // Hình ảnh của đơn hàng
            $table->timestamps();
    
            // Thêm khóa ngoại để liên kết với bảng orders
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_returns');
    }
};
