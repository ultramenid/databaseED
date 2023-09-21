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
            $table->string('tuntutanpenjara')->nullable();;
            $table->string('tuntutandenda')->nullable();;
            $table->string('tuntutangantirugi')->nullable();;
            $table->string('tuntutanpemulihan')->nullable();;
            $table->string('tuntutansitaaset')->nullable();;
            $table->string('pnpenjara')->nullable();;
            $table->string('pndenda')->nullable();;
            $table->string('pngantirugi')->nullable();;
            $table->string('pnpemulihan')->nullable();;
            $table->string('pnsitaaset')->nullable();;
            $table->string('pnfile')->nullable();;
            $table->string('ptpenjara')->nullable();
            $table->string('ptdenda')->nullable();;
            $table->string('ptgantirugi')->nullable();;
            $table->string('ptpemulihan')->nullable();;
            $table->string('ptsitaaset')->nullable();;
            $table->string('ptfile')->nullable();;
            $table->string('mapenjara')->nullable();;
            $table->string('madenda')->nullable();;
            $table->string('magantirugi')->nullable();;
            $table->string('mapemulihan')->nullable();;
            $table->string('masitaaset')->nullable();;
            $table->string('mafile')->nullable();;
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
