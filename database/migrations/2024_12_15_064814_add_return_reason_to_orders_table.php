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
        Schema::table('orders', function (Blueprint $table) {
            $table->text('return_reason')->nullable();  // Thêm cột return_reason
        });
    }

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn('return_reason');  // Xóa cột khi rollback
    });
}
};
