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
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangay_kagawad_id')->nullable()->constrained('barangay_officials')->onDelete('cascade');
            $table->foreignId('sk_kagawad_id')->nullable()->constrained('barangay_officials')->onDelete('cascade');
            $table->foreignId('purok_id')->constrained('puroks')->onDelete('cascade');
            $table->date('started_at')->nullable();
            $table->date('ended_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
