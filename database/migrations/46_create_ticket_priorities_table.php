

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {

Schema::create('ticket_priorities', function (Blueprint $table) {
    $table->id();

    $table->foreignId('company_id')->constrained()->cascadeOnDelete();

    $table->string('name'); // Low, Medium, High, Critical
    $table->integer('level')->default(1);

    $table->timestamps();

    $table->unique(['company_id', 'name']);
});

    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_priorities');
    }
};