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
            $table->foreign('professor_id')->references('id')->on('professores')->onDelete('cascade');
            $table->string('nome_aluno');
            $table->timestamp('data_envio')->useCurrent();
            $table->enum('status', ['respondido', 'pendente'])->default('pendente');
            $table->text('mensagem');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensagens');
    }
};
