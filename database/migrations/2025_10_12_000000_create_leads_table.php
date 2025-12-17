<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('origin');
            $table->string('destination');
            $table->string('cargo_type');
            $table->string('shipping_mode')->nullable();
            $table->string('container_size')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->text('message')->nullable();
            $table->date('shipping_date')->nullable();
            $table->enum('status', ['new', 'contacted', 'quoted', 'negotiating', 'won', 'lost', 'cancelled'])->default('new');
            $table->string('source')->default('website');
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->decimal('quoted_amount', 10, 2)->nullable();
            $table->string('currency')->default('USD');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
