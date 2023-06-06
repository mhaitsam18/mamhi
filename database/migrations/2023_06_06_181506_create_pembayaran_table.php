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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();

            $table->foreignId('konsultasi_id')->nullable()
                ->constrained('konsultasi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('psikotes_id')->nullable()
                ->constrained('psikotes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float('nominal')->nullable();
            $table->string('bukti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
