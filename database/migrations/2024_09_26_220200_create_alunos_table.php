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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->constrained();
            $table->json("atividades")->nullable();
            $table->string('profissao')->nullable();
            $table->string('escolaridade')->nullable();
            $table->string('ano_escolar')->nullable();
            $table->string('instituicao')->nullable();
            $table->string('turno')->nullable();
            $table->string('beneficio')->nullable();
            $table->string('comunidade')->nullable();
            $table->string('clinica')->nullable();
            $table->string('necessidade_especifica')->nullable();
            $table->json('uniformes')->nullable();
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
        Schema::dropIfExists('alunos');
    }
};
