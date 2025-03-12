<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return response()->json($produtos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_produto' => 'required|string|max:150',
            'valor_produto' => 'required|numeric',
            'id_categoria_produto' => 'required|exists:tb_categoria_produto,id_categoria_produto',
        ]);

        $produto = Produto::create($request->all());

        return response()->json($produto, 201);
    }

    public function show($id)
    {
        $produto = Produto::with('categoriaProduto')->find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto);
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome_produto' => 'required',
            'valor_produto' => 'required|numeric',
            'id_categoria_produto' => 'required|exists:tb_categoria_produto,id_categoria_produto'
        ]);
        $produto->update($request->all());
        return $produto;
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return response()->json(['message' => 'Produto deletado']);
    }
}
