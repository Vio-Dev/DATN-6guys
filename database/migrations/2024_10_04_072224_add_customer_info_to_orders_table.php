<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        if (!Schema::hasColumn('orders', 'name')) {
            $table->string('name')->nullable(false);
        }

        if (!Schema::hasColumn('orders', 'address')) {
            $table->string('address')->nullable(false);
        }

        if (!Schema::hasColumn('orders', 'phone')) {
            $table->string('phone')->nullable(false);
        }

        if (!Schema::hasColumn('orders', 'payment_method')) {
            $table->string('payment_method')->nullable(false);
        }
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn(['name', 'address', 'phone', 'payment_method']);
    });
}
};
