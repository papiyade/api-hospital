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
    Schema::table('prescriptions', function (Blueprint $table) {
        // $table->string('qr_code')->nullable()->unique();
        // $table->enum('status', ['pending', 'paid', 'dispensed'])
        //       ->default('pending');
    });
}

public function down(): void
{
    Schema::table('prescriptions', function (Blueprint $table) {
        $table->dropColumn(['qr_code', 'status']);
    });
}
};
