<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {


Schema::create('knowledge_base_articles', function (Blueprint $table) {
    $table->id();

    $table->foreignId('company_id')->constrained()->cascadeOnDelete();
    $table->foreignId('category_id')->nullable()->constrained('article_categories')->nullOnDelete();
    $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();

    $table->string('title');
    $table->text('content');
    $table->boolean('is_public')->default(true);
    $table->boolean('is_published')->default(true);

    $table->integer('views')->default(0);

    $table->timestamps();

    $table->index(['company_id', 'is_published']);
});

    }

    public function down(): void
    {
        Schema::dropIfExists('knowledge_base_articles');
    }
};