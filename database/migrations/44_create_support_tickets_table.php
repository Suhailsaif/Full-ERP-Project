<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {


Schema::create('support_tickets', function (Blueprint $table) {
    $table->id();

    $table->foreignId('company_id')->constrained()->cascadeOnDelete();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

    $table->string('ticket_number')->unique();
    $table->string('subject');
    $table->text('description');

    $table->foreignId('category_id')->nullable()->constrained('ticket_categories')->nullOnDelete();
    $table->foreignId('priority_id')->nullable()->constrained('ticket_priorities')->nullOnDelete();

    $table->enum('status', ['open', 'in_progress', 'waiting', 'resolved', 'closed'])->default('open');

    $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();

    $table->timestamps();

    $table->index(['company_id', 'status']);
});

    }
     public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};