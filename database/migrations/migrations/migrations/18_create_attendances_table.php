<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('shift_id')->nullable()->constrained()->nullOnDelete();

            $table->date('date');
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();

            $table->integer('worked_minutes')->default(0);
            $table->integer('overtime_minutes')->default(0);

            $table->enum('status', ['present', 'absent', 'late', 'half_day', 'leave'])->default('present');

            $table->string('checkin_ip')->nullable();
            $table->string('checkout_ip')->nullable();

            $table->timestamps();

            $table->unique(['company_id', 'user_id', 'date']);
            $table->index(['company_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
