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
        Schema::create('pessoas', function (Blueprint $table) {
			$table->id();
            $table->string('nome');
            $table->string('cpf')->nullable();
            $table->string('identidade')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('nome_pai')->nullable();
            $table->string('sexo')->nullable();
            $table->string('cor')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('nome_responsavel')->nullable();
            $table->string('parentesco_responsavel')->nullable();
            $table->string('telefone_responsavel')->nullable();
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
        Schema::dropIfExists('pessoas');
    }
};
