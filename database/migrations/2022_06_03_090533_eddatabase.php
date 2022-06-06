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
        Schema::create('eddatabase', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggalkejadian');
            $table->string('kasus');
            $table->string('provinsi');
            $table->string('kabkota');
            $table->string('kecamatan');
            $table->string('issu');
            $table->string('korban');
            $table->string('pekerjaan');
            $table->string('jeniskelamin');
            $table->integer('jumlahkorban');
            $table->string('pelaku');
            $table->string('namapelaku')->nullable();
            $table->string('akibat');
            $table->string('konflikdengan');
            $table->string('bentukancaman');
            $table->string('sektor');
            $table->string('kronologi');
            $table->string('perkembangankasus');
            $table->string('sumber');
            $table->string('lat');
            $table->string('long');
            $table->string('img');
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
        Schema::dropIfExists('eddatabase');
    }
};
