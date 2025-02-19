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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nikkaryawan');
            $table->string('sid');
            $table->string('fotodokumen');
            $table->bigInteger('usia');
            $table->string('jabatan');
            $table->string('perusahaan');
            $table->enum('jeniskelamin', ['Laki-laki', 'Perempuan']);
            $table->bigInteger('nohp');
            $table->enum('induksihr', ['Sudah', 'Belum']);
            $table->enum('induksishe', ['Sudah', 'Belum']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
