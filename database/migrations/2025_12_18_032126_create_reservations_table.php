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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->ondelete('cascade');     
            $table->foreignId('table_id')->nullable()->constrained('cust_tables', 'id');
            $table->enum('salutation', ['Ms.', 'Mr.', 'Mx.']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->integer('person_attend');
            $table->date('booking_date');
            $table->time('time_in');
            $table->time('time_out');
            $table->string('request')->nullable();
            $table->string('allergies')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['Pending Payment', 'Confirmed', 'Cancelled', 'No Show'])->default('Pending Payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
