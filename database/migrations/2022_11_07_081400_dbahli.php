<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbahli', function (Blueprint $table) {
            $table->id();
            $table->string('kriteriaahli');
            $table->string('nama');
            $table->string('gelar');
            $table->string('jabatan');
            $table->string('afliasi');
            $table->string('telp');
            $table->string('email');
            $table->longText('publikasi');
            $table->integer('stasi');
            $table->string('keahlian');
            $table->string('provinsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dbahli');
    }
};
