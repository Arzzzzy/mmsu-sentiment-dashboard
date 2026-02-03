<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sentiment_entries', function (Blueprint $table) {
            $table->id();
            $table->text('original_text');
            $table->string('sentiment_label')->nullable(); // e.g., Positive, Negative
            $table->float('confidence_score')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sentiment_entries');
    }
};