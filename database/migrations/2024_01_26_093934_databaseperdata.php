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
        Schema::create('dbkasusperdata', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('statuseksekusi');
            $table->string('namapenggugat');
            $table->string('namatergugat');
            $table->string('nomorperkara');
            $table->string('wilayah');
            $table->string('jeniskasus');
            $table->string('sektor');
            $table->string('nilaikerugian');
            $table->string('dakwaan');
            $table->string('gantirugi')->nullable();
            $table->string('pemulihan')->nullable();
            $table->string('lainnya')->nullable();
            $table->string('pngantirugi')->nullable();
            $table->string('pnpemulihan')->nullable();
            $table->string('pnlainya')->nullable();
            $table->string('pnfile')->nullable();
            $table->string('ptgantirugi')->nullable();
            $table->string('ptpemulihan')->nullable();
            $table->string('ptlainya')->nullable();
            $table->string('ptfile')->nullable();
            $table->string('magantirugi')->nullable();
            $table->string('mapemulihan')->nullable();
            $table->string('malainya')->nullable();
            $table->string('mafile')->nullable();
            $table->string('pkmagantirugi')->nullable();
            $table->string('pkmapemulihan')->nullable();
            $table->string('pkmalainya')->nullable();
            $table->string('pkmafile')->nullable();
            $table->text('kaidahhukum')->nullable();
            $table->text('proses')->nullable();
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
        Schema::dropIfExists('dbkasusperdata');
    }
};
