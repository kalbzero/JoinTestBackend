<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProdutoTable extends Migration
{
    public function up()
    {
        Schema::create('tb_produto', function (Blueprint $table) {
            $table->id('id_produto'); // PK
            $table->foreignId('id_categoria_produto')
                  ->constrained('tb_categoria_produto', 'id_categoria_produto')
                  ->onDelete('cascade');
            $table->timestamp('data_cadastro')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nome_produto', 150);
            $table->float('valor_produto', 10, 2);
            $table->timestamps();

            // Índice para a FK
            $table->index('id_categoria_produto', 'IXFK_tb_produto_tb_categoria_produto');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_produto');
    }
}
