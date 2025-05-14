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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('namapelatihan');
            $table->string('instansi');
            $table->date('jadwalkegiatan');
            $table->enum('jeniskegiatan', ['Online', 'Offline']);
            $table->enum('jenis', ['Internal', 'Eksternal']);
            $table->string('linkzoom');
            $table->integer('id_penyelengaraas')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
