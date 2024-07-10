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
        //
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();  
            $table->string('name', 50);
            $table->unsignedBigInteger('id_guru');  
            $table->foreign('id_guru')->references('id')->on('guru')->ondelete('cascade')->onupdate('cascade');
            $table->enum('jk', ['L', 'P']);
            $table->string('notelp', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
