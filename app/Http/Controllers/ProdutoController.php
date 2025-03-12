<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return response()->json($produtos);
    }

    public function store(Request $request)
    {
        $produto = Produto::create($request->validated());
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
        $produto->update($request->validated());
        return response()->json($produto);
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return response()->json(['message' => 'Produto deletado']);
    }
}
