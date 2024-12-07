<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('address')->nullable()->change(); // Đặt `address` là nullable
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('address')->nullable(false)->change(); // Trả lại như cũ nếu cần
    });
}

};
