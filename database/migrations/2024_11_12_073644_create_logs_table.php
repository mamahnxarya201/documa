<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('DROP SCHEMA IF EXISTS system CASCADE');
        DB::statement('CREATE SCHEMA system');
        Schema::create('system.logs', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('type');
            $table->string('message');
            $table->string('description');
            $table->jsonb('data');
            $table->jsonb('who');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system.logs');
        DB::statement('DROP SCHEMA IF EXISTS system CASCADE');
    }
};
