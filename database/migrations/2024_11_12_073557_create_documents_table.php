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
        Schema::create('documents', function (Blueprint $table) {
            $table->uuid("id")->unique()->primary();
            $table->string('name');
            $table->foreignUuid('author')->references('id')->on('users');
            $table->jsonb('shared_to');
            $table->jsonb('notes');
            $table->jsonb('attachment');
            $table->jsonb('comment');
            $table->jsonb('tags');
            $table->foreign('reviewer')->references('id')->on('users');
            $table->foreignUuid('status')->references('id')->on('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
