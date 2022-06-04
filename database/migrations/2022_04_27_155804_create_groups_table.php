<?php

use App\Models\Group;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('periodo');
            $table->unsignedBigInteger("school_id");
            $table->unsignedBigInteger("category_id")->nullable();//Idioma
            $table->unsignedBigInteger("level_id")->nullable();
            $table->unsignedBigInteger("teacher_id")->nullable();
            $table->unsignedBigInteger("course_id")->nullable();
            $table->enum("status",[Group::BORRADOR,Group::ACTIVO,Group::FINALIZADO])->default(Group::BORRADOR);
            
            $table->foreign("school_id")->references("id")->on("schools")->onDelete("cascade");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("set null");
            $table->foreign("level_id")->references("id")->on("levels")->onDelete("set null");
            $table->foreign("teacher_id")->references("id")->on("users")->onDelete("set null");
            $table->foreign("course_id")->references("id")->on("courses")->onDelete("set null");
            
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
        Schema::dropIfExists('groups');
    }
};
