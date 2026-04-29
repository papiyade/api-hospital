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
Schema::create('pharmacy_transactions', function (Blueprint $table) {
    $table->id();

    $table->foreignId('prescription_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->enum('status', ['pending', 'paid', 'dispensed', 'failed'])
        ->default('pending');

    $table->decimal('total_amount', 10, 2)->nullable();

    $table->string('payment_method')->nullable();
    $table->string('transaction_reference')->nullable();

    $table->timestamps();

    $table->index('prescription_id');
    $table->index('status');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_transactions');
    }
};
