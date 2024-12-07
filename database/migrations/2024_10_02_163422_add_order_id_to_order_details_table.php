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
        if (!Schema::hasColumn('order_details', 'order_id')) {
            Schema::table('order_details', function (Blueprint $table) {
                $table->unsignedBigInteger('order_id')->nullable(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('order_details', function (Blueprint $table) {
        $table->dropForeign(['order_id']); // Xóa khóa ngoại
        $table->dropColumn('order_id'); // Xóa cột order_id
    });
}
};
