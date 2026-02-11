

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {

Schema::create('reports', function (Blueprint $table) {
    $table->id();

    $table->foreignId('company_id')->constrained()->cascadeOnDelete();
    $table->string('name');
    $table->string('type'); // sales, attendance, payroll, productivity

    $table->json('filters')->nullable();
    $table->boolean('is_active')->default(true);

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
