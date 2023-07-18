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
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            // $table->timestamps();

            $table->foreignUlid('role_id')->constrained();
            $table->ulid('id')->primary();
            $table->string('slug')->unique();
            $table->string('vorname');
            $table->string('zweitename')->nullable();
            $table->string('nachname');
            $table->string('benutzername')->unique();
            $table->string('telefon')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('profil_foto_url')->nullable();
            $table->string('haus_nummer')->nullable();
            $table->string('strasse')->nullable();
            $table->string('stadteil')->nullable();
            $table->string('postleitzahl')->nullable();
            $table->string('stadt')->nullable();
            $table->string('land')->nullable()->nullable();
            $table->string('webseite')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('threads_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('xing_url')->nullable();
            $table->string('andere_social')->nullable();
            $table->string('andere_social_url')->nullable();
            $table->string('anschreiben')->nullable();
            $table->string('anschreiben_url')->nullable();
            $table->string('lebenslauf_url')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
