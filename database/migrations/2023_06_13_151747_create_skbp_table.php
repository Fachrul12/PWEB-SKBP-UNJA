<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            
        Schema::create('skbps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email');
            $table->integer('nomor_wa');
            $table->string('fakultas');
            $table->string('prodi');
            $table->blob('ktm');
            $table->blob('spp');
            $table->timestamps();
            $table->timestamp('validasi_at');
            $table->string('status');
            $table->blob('file_skbp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skbp');
    }
}
