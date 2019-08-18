<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\consulta;

class ConsultaController extends Controller
{
     public function index() {
        $consulta = Consulta::all();
        $total = $consulta->count();
        return view('list-consulta', compact('consulta', 'total'));
    }

    public function create() {
        dd(uniqid());
        return view('include-consulta');
    }

    public function store(Request $request) {
        $consulta = new Consulta();
        $consulta->nome = $request->nome;
        $consulta->tipo = $request->tipo;
        $consulta->fusex = $request->fusex;
        $consulta->telefone = $request->telefone;
        $consulta->especialidade = $request->especialidade;
        $consulta->preferencia = $request->preferencia;
        $consulta->observacoes = $request->observacoes;
        $consulta->data = date('d-m-y h:i:s');
        $consulta->save();
        return redirect()->route('consulta.index')->with('message', 'Pedido de Guia enviado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $consulta = Consulta::findOrFail($id);
        return view('alter-consulta', compact('consulta'));
    }

    public function update(Request $request, $id) {
        $consulta = Consulta::findOrFail($id); 
        $consulta->nome = $request->nome;
        $consulta->fusex = $request->fusex;
        $consulta->telefone = $request->telefone;
        $consulta->observacoes = $request->observacoes;
        $consulta->save();
        return redirect()->route('consulta.index')->with('message', 'Pedido de Guia alterado com sucesso!');
    }

    public function destroy($id) {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();
        return redirect()->route('consulta.index')->with('message', 'Pedido de Guia excluída com sucesso!');  
    }
}