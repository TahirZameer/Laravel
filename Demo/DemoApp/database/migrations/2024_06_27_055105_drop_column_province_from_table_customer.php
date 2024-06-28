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
        // Schema::table('table_customer', function (Blueprint $table) {
        //     //
        // });

        Schema::table('customer', function (Blueprint $table) {
            $table->dropColumn('province');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('table_customer', function (Blueprint $table) {
        //     //
        // });
        Schema::table('customer', function (Blueprint $table) {
            $table->string('province', 50)->nullable()->after('customer_address');
        });
    }
};
