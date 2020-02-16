<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReportTotales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_totales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('report_id');
            $table->timestamps();
            $table->string('n_group')->nullable();
            $table->string('columna');
            $table->string('suma');
            $table->string('porcentaje');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_totales');
    }
}
