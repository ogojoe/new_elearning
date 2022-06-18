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

            $table->string("name");
            $table->integer("score");
            $table->integer("chance");
            
            $table->unsignedBigInteger("evaluation_id")->nullable();
            $table->unsignedBigInteger("user_id");

            $table->foreign("evaluation_id")->references("id")->on("evaluations")->onDelete("set null");
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
        Schema::dropIfExists('scores');
    }
};
