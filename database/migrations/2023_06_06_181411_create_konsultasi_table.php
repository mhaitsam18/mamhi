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
                ->nullOnDelete();
            $table->foreignId('psikolog_id')->nullable()
                ->constrained('psikolog')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->string('keluhan')->nullable();
            $table->timestamp('booked_at')->nullable();
            $table->date('tanggal_konsultasi')->nullable();
            $table->foreignId('jadwal_id')->nullable()
                ->constrained('jadwal')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->enum('status', ['booking', 'booking diterima', 'batal', 'selesai'])->nullable();
            $table->float('tagihan')->default(350000)->nullable();
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
