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
        Schema::create('nilai_psikotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psikotes_id')->nullable()
                ->constrained('psikotes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('dokumen_soal')->nullable();
            $table->string('dokumen_jawaban')->nullable();
            $table->string('dokumen_hasil')->nullable();
            $table->string('sertifikat')->nullable();
            $table->double('nilai', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_psikotes');
    }
};
