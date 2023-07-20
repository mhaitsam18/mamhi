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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->text('kutipan');
            $table->text('konten');
            $table->string('slug')->unique();
            $table->foreignId('author_id')->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->string('thumbnail');
            $table->integer('views')->default(0);
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
