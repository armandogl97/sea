<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('characteristic_id');
            $table->unsignedBigInteger('project_id');

            $table->string('ambit');
            $table->string('name_e');
            $table->string('pressure')->nullable();
            $table->string('state')->nullable();
            $table->string('impact')->nullable();
            $table->string('response')->nullable();

            //FK
            $table->foreign('characteristic_id')->references('id')->on('characteristics')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');


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
        Schema::dropIfExists('elements');
    }
}
