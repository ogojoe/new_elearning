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
        Schema::create('question_toefls', function (Blueprint $table) {
            $table->id();

            $table->string("name");

            $table->string("type_resource")->nullable();
            $table->string("url")->nullable();
            $table->text("iframe")->nullable();

            $table->unsignedBigInteger("skill_id");
            
            $table->unsignedBigInteger("toefl_id");

            $table->foreign("toefl_id")->references("id")->on("toefls")->onDelete("cascade");
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
        Schema::dropIfExists('question_toefls');
    }
};
