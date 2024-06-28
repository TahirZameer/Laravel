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
        // Schema::create('customer', function (Blueprint $table) {
        //     $table->string('country', 50)->after('customer_address');
        //     $table->string('province', 50)->nullable()->after('customer_address');
        // });
        Schema::table('customer', function (Blueprint $table) {
            $table->string('country', 50)->after('customer_address')->nullable(false);
            $table->string('province', 50)->after('customer_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('customer');
        Schema::table('customer', function (Blueprint $table) {
            $table->dropColumn('country');
            $table->dropColumn('province');
        });
    }
};
