<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetoRequest;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory
    {
        $projetos = Project::paginate(5);
        $projetos->load('client');
        $clientes = Client::all();

        return view('projetos.index', [
            'projetos' => $projetos,
            'clientes' => $clientes
        ]);
    }

    /**
     * Mostra o formulário para criar um novo projetos.
     */
    public function create(): View|Factory
    {
        $clientes = Client::all();

        return view('projetos.create', compact('clientes'));
    }

    /**
     * Cria um novo projetos no banco de dados.
     */
    public function store(ProjetoRequest $request): \Redirect|RedirectResponse
    {
        Project::create($request->all());

        return redirect()->route('projetos.index')->with('success', 'Projeto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * MOSTRA O FORMULÁRIO com os dados para edição.
     */
    public function edit(Project $projeto): View|Factory
    {
        $clientes = Client::all();
        return view('projetos.edit', [
            'projeto' => $projeto,
            'clientes' => $clientes
        ]);
    }

    /**
     * Atualiza o projeto no banco de dados.
     */
    public function update(ProjetoRequest $request, Project $projeto): \Redirect|RedirectResponse
    {
        $projeto->update($request->all());
        return redirect()->route('projetos.index')->with('success', 'Projeto atualizado com sucesso!');
    }

    /**
     * Deleta o projeto
     */
    public function destroy(Project $projeto): RedirectResponse
    {
        $projeto->delete();
        return redirect()->route('projetos.index')->with('success', 'Projeto removido com sucesso!');
    }
}
