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
        Schema::create('dbkasussda', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('namaterdakwa');
            $table->string('statusterdakwa');
            $table->string('nomorperkara');
            $table->string('wilayah');
            $table->string('jeniskasus');
            $table->string('sektor');
            $table->string('nilaikerugian');
            $table->string('dakwaan');
            $table->string('tuntutanpenjara');
            $table->string('tuntutandenda');
            $table->string('tuntutangantirugi');
            $table->string('tuntutanpemulihan');
            $table->string('tuntutansitaaset');
            $table->string('pnpenjara');
            $table->string('pndenda');
            $table->string('pngantirugi');
            $table->string('pnpemulihan');
            $table->string('pnsitaaset');
            $table->string('pnfile');
            $table->string('ptpenjara');
            $table->string('ptdenda');
            $table->string('ptgantirugi');
            $table->string('ptpemulihan');
            $table->string('ptsitaaset');
            $table->string('ptfile');
            $table->string('mapenjara');
            $table->string('madenda');
            $table->string('magantirugi');
            $table->string('mapemulihan');
            $table->string('masitaaset');
            $table->string('mafile');
            $table->longText('kaidahhukum');
            $table->string('tglupdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dbkasussda');
    }
};
