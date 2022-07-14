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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();

            $table->double("score",5,2);
            $table->integer("chance");
            $table->string("dateLastTry");
            $table->tinyInteger('status')->default(1);//1. Activo, 2. Inactivo, 
            
            $table->unsignedBigInteger("evaluation_id");
            $table->unsignedBigInteger("student_id");

            $table->foreign("evaluation_id")->references("id")->on("evaluations")->onDelete("cascade");
            $table->foreign("student_id")->references("id")->on("students")->onDelete("cascade");

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
        Schema::dropIfExists('scores');
    }
};
