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
        Schema::create('dbputusansatwa', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('terdakwa');
            $table->string('provinsi');
            $table->string('kabkota');
            $table->string('object');
            $table->string('dakwaan');
            $table->string('ancamanuupenjara');
            $table->string('ancamanuudenda');
            $table->string('tuntutanpenjara');
            $table->string('tuntutandenda');
            $table->string('putusanpenjara');
            $table->string('putusandenda');
            $table->string('noputusan');
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
        Schema::dropIfExists('dbputusansatwa');
    }
};
