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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();

            $table->string('type');
            $table->string('title')->nullable();
            $table->foreignId('creator_id')
                ->references('id')
                ->on('users');

            $table->integer('dm_first_user_id')->nullable();
            $table->integer('dm_second_user_id')->nullable();

            $table->unique(['dm_first_user_id', 'dm_second_user_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
