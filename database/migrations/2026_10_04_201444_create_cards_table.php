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
        Schema::create('cards', function (Blueprint $table) {
            $table->string('card_id')->primary();

            $table->string('name');
            $table->string('manufacturer')->nullable();
            $table->string('namemaufacturer_short')->nullable();

            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->string('signetta')->nullable();

            $table->unsignedSmallInteger('year')->nullable();

            $table->integer('card_count')->nullable();

            $table->integer('joker')->nullable();
            $table->integer('extra_cards')->nullable();
             $table->string('suit')->nullable();
             $table->string('index')->nullable();

            $table->string('size')->nullable();

            $table->string('type1')->nullable();
            $table->string('type2')->nullable();

            $table->string('cover_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
