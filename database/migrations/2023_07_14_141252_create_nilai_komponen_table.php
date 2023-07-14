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
        Schema::create('nilai_komponen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('komponen_nilai_id')->nullable()
                ->constrained('komponen_nilai')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->foreignId('psikotes_id')->nullable()
                ->constrained('psikotes')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->double('nilai', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_komponen');
    }
};
