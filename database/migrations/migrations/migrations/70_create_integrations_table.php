
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
Schema::create('integrations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('company_id')->constrained()->cascadeOnDelete();

    $table->string('provider'); // google, slack, whatsapp, razorpay
    $table->json('credentials')->nullable();
    $table->boolean('is_active')->default(true);

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('integrations');
    }
};
