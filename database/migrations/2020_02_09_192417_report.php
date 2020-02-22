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
            $table->string('p1')->default(0);
            $table->string('p2')->default(0);
            $table->string('p3')->default(0);
            $table->string('p4')->default(0);
            $table->string('p5')->default(0);
            $table->string('p6')->default(0);
            $table->string('p7')->default(0);
            $table->string('p8')->default(0);
            $table->string('p9')->default(0);
            $table->string('p10')->default(0);
            $table->string('p11')->default(0);
            $table->string('p12')->default(0);
            $table->string('p13')->default(0);
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
