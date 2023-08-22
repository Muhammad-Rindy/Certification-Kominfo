<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga_form', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID pengguna warga yang mengisi form
            $table->string('nama');
            $table->string('alamat');
            $table->integer('umur');
            $table->boolean('approved_by_rt')->default(false); // Status persetujuan oleh RT
            $table->boolean('approved_by_rw')->default(false); // Status persetujuan oleh RW
            $table->string('dokumen')->nullable(); // Nama file dokumen yang diunggah
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warga_form');
    }
}