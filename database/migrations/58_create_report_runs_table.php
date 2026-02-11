


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
Schema::create('report_runs', function (Blueprint $table) {
    $table->id();

    $table->foreignId('report_id')->constrained()->cascadeOnDelete();
    $table->foreignId('generated_by')->constrained('users')->cascadeOnDelete();

    $table->string('file_path')->nullable();
    $table->timestamp('generated_at');

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('report_runs');
    }
};
