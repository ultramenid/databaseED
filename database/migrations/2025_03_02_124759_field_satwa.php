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
        Schema::table('dbputusansatwa', function (Blueprint $table) {
            $table->longText('dakwaan')->change();
            $table->longText('object')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eddatabase', function (Blueprint $table) {
            $table->string('dakwaan')->change();
            $table->string('object')->change();
        });
    }
};
