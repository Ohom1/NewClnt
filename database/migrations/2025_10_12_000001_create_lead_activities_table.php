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
        Schema::create('lead_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('type', ['note', 'email', 'whatsapp', 'call', 'status_change', 'assignment', 'file']);
            $table->text('content')->nullable();
            $table->string('email_subject')->nullable();
            $table->string('whatsapp_message_id')->nullable();
            $table->string('whatsapp_status')->nullable();
            $table->string('email_message_id')->nullable();
            $table->string('email_status')->nullable();
            $table->string('old_status')->nullable();
            $table->string('new_status')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_activities');
    }
};
