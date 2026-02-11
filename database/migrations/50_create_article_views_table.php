
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {

Schema::create('article_views', function (Blueprint $table) {
    $table->id();

    $table->foreignId('knowledge_base_article_id')->constrained()->cascadeOnDelete();
    $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

    $table->ipAddress('ip_address')->nullable();
    $table->timestamp('viewed_at');

    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('article_views');
    }
};