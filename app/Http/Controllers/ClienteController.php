<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

/**
 * Controller do @Client
 */
class ClienteController extends Controller
{
    /**
     * Lista os clientes do banco de dados
     *
     * @return View|Factory
     */
    public function index()
    {
        $clientes = Client::paginate(5);
        $clientes->load('projects');

        return view('clientes.index', [
            'clientes' => $clientes
        ]);
    }

    /**
     * Mostra o formulário de cadastro de clientes
     *
     * @return View|Factory
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Grava o cliente no banco de dados
     * @return RedirectResponse
     */
    public function store(ClienteRequest $request)
    {
        Client::create($request->all());

        return redirect()->route('clientes.index')->with('mensagem', 'Cliente cadastrado com sucesso.');
    }

    /**
     * Mostra o formulário preenchido para edição
     * @param Client $cliente
     * @return Application|Factory|View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function show(Client $cliente)
    {
        return view('clientes.show', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Atualiza o cliente no banco de dados
     * @param ClienteRequest $request
     * @param Client $cliente
     * @return RedirectResponse
     */
    public function update(ClienteRequest $request, Client $cliente)
    {
        //$cliente = Client::findOrFail($cliente->id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('mensagem', 'Cliente atualizado com sucesso.');
    }

    /**
     * Apaga um cliente do banco de dados
     * @param Client $cliente
     * @return RedirectResponse
     */
    public function destroy(Client $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('mensagem', 'Cliente deletado com sucesso.');
    }
}
