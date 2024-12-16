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
    // Kiểm tra xem bảng đã tồn tại hay chưa
    if (Schema::hasTable('notifications')) {
        Schema::table('notifications', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->after('id');
        });
    }
}

public function down()
{
    // Xóa cột user_id nếu cần
    Schema::table('notifications', function (Blueprint $table) {
        $table->dropColumn('user_id');
    });
}

};
