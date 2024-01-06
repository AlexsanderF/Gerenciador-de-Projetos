<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Client::get();

        return view('clientes.index', [
            'clientes' => $clientes
        ]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        var_dump($dados);
    }
}
