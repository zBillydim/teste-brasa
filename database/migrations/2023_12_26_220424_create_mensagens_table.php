<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensagensTable extends Migration
{
    public function up()
    {
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professor_id');
            $table->string('nome_aluno');
            $table->date('nascimento');
            $table->string('whatsapp', 50);
            $table->string('cidade', 50);
            $table->string('estado', 50);
            $table->text('mensagem');
            $table->timestamps();
        });

        Schema::table('mensagens', function (Blueprint $table) {
            $table->foreign('professor_id')->references('id')->on('professores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensagens');
    }
};
