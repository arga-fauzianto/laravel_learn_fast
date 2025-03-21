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
            $table->id();
            $table->foreignId('list_id')->constrained('list_cards')->onDelete('cascade');
            $table->unsignedBigInteger('list_id');  // Add the new 'list_card_id' column
            $table->foreign('list_card_id')->references('id')->on('list_cards')->onDelete('cascade');  // Foreign key constraint
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropForeign(['list_id']);
            $table->dropColumn('list_id');
        });

        Schema::dropIfExists('cards');
    }
};
