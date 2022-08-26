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
        Schema::create('scores_toefls', function (Blueprint $table) {
            $table->id();

            $table->double("score",5,2)->default(0);
            $table->text("respuestas")->nullable();
            $table->text("inicio")->nullable();
            $table->text("fin")->nullable();
            $table->tinyInteger("chance")->default(1);
            $table->string("dateLastTry")->nullable();
            $table->tinyInteger('status')->default(1);//1. Activo, 2. Inactivo, 
            
            $table->unsignedBigInteger("toefl_id");
            $table->unsignedBigInteger("user_id");

            $table->foreign("toefl_id")->references("id")->on("toefls")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");

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
        Schema::dropIfExists('scores_toefls');
    }
};
