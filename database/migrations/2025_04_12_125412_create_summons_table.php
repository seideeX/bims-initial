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
        Schema::create('summons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blotter_id')->constrained('blotter_reports')->onDelete('cascade');
            $table->foreignId('respondent_id')->nullable()->constrained('residents')->onDelete('cascade');
            $table->string('name', 155);
            $table->enum('status', ['pending', 'attended', 'missed', 'rescheduled']);
            $table->text('remarks')->nullable();
            $table->foreignId('issued_by')->constrained('barangay_officials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summons');
    }
};
