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
        Schema::table('voluntarios', function (Blueprint $table) {
            $table->foreignId('pessoa_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voluntarios', function (Blueprint $table) {
            $table->foreignId('pessoa_id')->constrained()->onDelete('cascade');
        });
    }
};
