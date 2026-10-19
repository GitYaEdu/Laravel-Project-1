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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->constrained('tables');
            $table->foreignId('user_id')->constrained('users');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->unsignedInteger('number_of_guests')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->enum('status', ['Подтверждено', 'Отменено', 'Активно', 'Завершено', 'В ожидании'])->default('В ожидании');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
