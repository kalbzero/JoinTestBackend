<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaProdutoTable extends Migration
{
    public function up()
    {
        Schema::create('tb_categoria_produto', function (Blueprint $table) {
            $table->id('id_categoria_produto'); // PK
            $table->string('nome_categoria', 150);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_categoria_produto');
    }
}
