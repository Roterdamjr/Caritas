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
            $table->string('profissao');
            $table->string('escolaridade');
            $table->string('ano_escolar');
            $table->string('instituicao');
            $table->string('turno');
            $table->string('beneficio');
            $table->string('comunidade');
            $table->string('clinica');
            $table->string('acompanhamento');
            $table->string('necessidade_especial');
            $table->string('uniforme');
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
