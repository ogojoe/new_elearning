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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("instructions");

            $table->string("grammar_type_resource")->nullable();
            $table->string("grammar_url_resource")->nullable();
            $table->string("learning_type_resource")->nullable();
            $table->string("learning_url_resource")->nullable();
            $table->string("reading_type_resource")->nullable();
            $table->string("reading_url_resource")->nullable();

            $table->unsignedBigInteger("course_id");

            $table->foreign("course_id")->references("id")->on("courses")->onDelete("cascade");

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
        Schema::dropIfExists('evaluations');
    }
};
