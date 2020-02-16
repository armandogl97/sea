<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Report extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('project_id');
            $table->timestamps();
            $table->string('politicas')->default(0);
            $table->string('educacion')->default(0);
            $table->string('investigacion')->default(0);
            $table->string('planeacion')->default(0);
            $table->string('institucional')->default(0);
            $table->string('salud')->default(0);
            $table->string('legislacion')->default(0);
            $table->string('tabla');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report');
    }
}
