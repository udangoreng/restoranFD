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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('reservations', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('order_code')->unique();
            $table->decimal('total_amount', 10, 2);
            $table->decimal('down_payment_amount', 10, 2)->nullable();
            $table->decimal('remaining_amount', 10, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->enum('payment_type', ['Down_Payment', 'Full_Settlement']);
            $table->string('midtrans_order_id')->nullable();
            $table->string('snap_token')->nullable();
            $table->enum('status', ['Pending', 'Processing', 'Completed', 'Cancelled'])->default('Pending');
            $table->boolean('down_payment_paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
