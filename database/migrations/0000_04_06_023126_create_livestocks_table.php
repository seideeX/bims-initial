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
        Schema::create('livestocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->constrained('residents')->onDelete('cascade');
            $table->enum('livestock_type', ['chicken', 'cow', 'carabao', 'goat', 'pig', 'duck', 'others']);
            $table->string('other_livestock', 55)->nullable();
            $table->integer('quantity');
            $table->enum('purpose', ['personal consumption', 'commercial', 'both']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestocks');
    }
};
