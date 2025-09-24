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
        Schema::create('apc_logs', function (Blueprint $table) {
            $table->id();
            $table->string('action', 50)->index();
            $table->unsignedInteger('entity_id')->nullable();
            $table->unsignedInteger('user_id')->index();
            $table->string('old_value', 180);
            $table->string('new_value', 180);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apc_logs');
    }
};
