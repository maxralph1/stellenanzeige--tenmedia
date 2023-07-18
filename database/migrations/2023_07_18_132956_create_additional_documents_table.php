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
        Schema::create('additional_documents', function (Blueprint $table) {
            $table->foreignUlid('user_id')->constrained();
            $table->ulid('id')->primary();
            $table->string('slug')->unique();
            $table->string('dokument_titel');
            $table->string('dokument_url');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_documents');
    }
};
