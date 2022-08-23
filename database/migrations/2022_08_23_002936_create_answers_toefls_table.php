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
        Schema::create('answers_toefls', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->tinyInteger("is_correct")->default(0);
            
            $table->unsignedBigInteger("question_toefl_id");

            $table->foreign("question_toefl_id")->references("id")->on("question_toefls")->onDelete("cascade");

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
        Schema::dropIfExists('answers_toefls');
    }
};
