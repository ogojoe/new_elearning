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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('clave')->unique()->nullable();
            $table->string('tipo');//privada o publica
            $table->string('phone');
            $table->string('email');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->unsignedTinyInteger('status')->nullable();

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
        Schema::dropIfExists('schools');
    }
};
