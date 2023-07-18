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
        Schema::create('jobs', function (Blueprint $table) {
            $table->foreignUlid('company_id')->constrained();
            $table->foreignUlid('user_id')->nullable()->constrained();
            $table->ulid('id')->primary();
            $table->string('slug')->unique();
            $table->string('bezeichnung');
            $table->longText('beschreibung');
            $table->string('standort');
            $table->boolean('bewerbungen_per_email_erhalten')->default(false);
            $table->string('email_bucket_für_bewerbungen')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
