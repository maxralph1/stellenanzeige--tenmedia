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
        Schema::create('companies', function (Blueprint $table) {
            $table->foreignUlid('user_id')->nullable()->constrained();
            $table->ulid('id')->primary();
            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->string('beschreibung');
            $table->string('telefon')->unique();
            $table->string('benutzername')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('firma_logo_url');
            $table->string('haus_nummer')->nullable();
            $table->string('strasse');
            $table->string('stadteil');
            $table->string('postleitzahl');
            $table->string('stadt');
            $table->string('land');
            $table->string('webseite')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('threads_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('xing_url')->nullable();
            $table->string('andere_social')->nullable();
            $table->string('andere_social_url')->nullable();
            $table->boolean('hinzugefügt_von_tenmedia')->default(false);
            $table->string('hinzugefügt_von')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
