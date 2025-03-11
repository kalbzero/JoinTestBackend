<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProduto;
use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{
    public function index()
    {
        return CategoriaProduto::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_categoria' => 'required|string|max:150',
        ]);

        $categoria = CategoriaProduto::create($request->all());

        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = CategoriaProduto::with('produtos')->find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        return response()->json($categoria);
    }

    public function update(Request $request, CategoriaProduto $categoria)
    {
        $request->validate(['nome_categoria' => 'required']);
        $categoria->update($request->all());
        return response()->json($categoria);
    }

    public function destroy(CategoriaProduto $categoria)
    {
        $categoria->delete();
        return response()->json(['message' => 'Categoria deletada']);
    }
}
