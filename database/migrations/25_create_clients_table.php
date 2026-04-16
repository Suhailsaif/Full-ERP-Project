<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration {
//     public function up(): void
//     {
//         Schema::create('clients', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('company_id')->constrained()->cascadeOnDelete();

//             $table->string('name');
//             $table->string('email')->nullable();
//             $table->string('phone')->nullable();
//             $table->string('company_name')->nullable();

//             $table->string('gst_number')->nullable();
//             $table->string('address')->nullable();
//             $table->string('city')->nullable();
//             $table->string('country')->nullable();

//             $table->boolean('is_active')->default(true);
//             $table->timestamps();

//             $table->index(['company_id', 'name']);
//         });
//     }

//     public function down(): void
//     {
//         Schema::dropIfExists('clients');
//     }
// };



Schema::create('clients', function (Blueprint $table) {
    $table->id();
    $table->foreignId('tenant_id')->constrained()->cascadeOnDelete();

    $table->string('name');
    $table->string('email')->nullable();
    $table->string('phone')->nullable();
    $table->string('company_name')->nullable();

    $table->string('tax_number')->nullable();
    $table->string('website')->nullable();

    $table->text('address')->nullable();
    $table->string('city')->nullable();
    $table->string('country')->nullable();

    $table->enum('status', ['active', 'inactive'])->default('active');

    $table->timestamps();
    $table->softDeletes();

    $table->index(['tenant_id', 'status']);
});