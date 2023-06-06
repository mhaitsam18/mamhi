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
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()
                ->constrained('member')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('psikolog_id')->nullable()
                ->constrained('psikolog')
                ->onUpdate('cascade')
                ->nullOnDelete();

            

            $table->string('keluhan');
            $table->timestamp('booked_at');
            
            $table->date('tanggal_konsultasi');
            $table->foreignId('jadwal_id')->nullable()
                ->constrained('jadwal')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->enum('status', ['booking','batal', 'selesai'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi');
    }
};
