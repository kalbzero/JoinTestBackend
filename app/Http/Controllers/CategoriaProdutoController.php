<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProduto;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaProdutoRequest;

class CategoriaProdutoController extends Controller
{
    public function index()
    {
        return CategoriaProduto::all();
    }

    public function store(Request $request)
    {
        $categoria = CategoriaProduto::create($request->validated());
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
        $categoria->update($request->validated());
        return response()->json($categoria);
    }

    public function destroy(CategoriaProduto $categoria)
    {
        $categoria->delete();
        return response()->json(['message' => 'Categoria deletada']);
    }
}
