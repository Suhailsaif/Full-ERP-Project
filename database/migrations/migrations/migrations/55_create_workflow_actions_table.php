


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {



Schema::create('workflow_actions', function (Blueprint $table) {
    $table->id();

    $table->foreignId('workflow_id')->constrained()->cascadeOnDelete();
    $table->string('action_type'); // notify, assign, update, webhook
    $table->json('payload')->nullable();

    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('workflow_actions');
    }
};