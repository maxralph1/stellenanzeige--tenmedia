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
        Schema::create('applications', function (Blueprint $table) {
            $table->foreignUlid('job_id')->constrained();
            $table->foreignUlid('user_id')->constrained();
            $table->ulid('id')->primary();
            $table->string('slug');
            $table->string('anschreiben');
            $table->string('anschreiben_url');
            $table->string('lebenslauf_url');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
