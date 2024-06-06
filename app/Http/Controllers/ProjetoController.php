<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetoRequest;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class @ProjetoController
 */
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
        $funcionarios = Employee::ativo()->get();

        return view('projetos.create', [
            'clientes' => $clientes,
            'funcionarios' => $funcionarios
        ]);
    }

    /**
     * Cria um novo projetos no banco de dados.
     */
    public function store(ProjetoRequest $request): \Redirect|RedirectResponse
    {

        $projectSuccess = Project::criarComFuncionarios(
            $request->except('funcionarios'),
            $request->funcionarios
        );

        if (!$projectSuccess) {
            return redirect()->back()->withInput()->withErrors(['Erro ao criar projeto']);
        }

        return redirect()->route('projetos.index')->with('success', 'Projeto cadastrado com sucesso!');
    }

    /**
     * Mostra o formulário com os dados para edição.
     */
    public function show(Project $projeto): View|Factory
    {
        return view('projetos.show', compact('projeto'));
    }

    /**
     * MOSTRA O FORMULÁRIO com os dados para edição.
     */
    public function edit(Project $projeto): View|Factory
    {
        $clientes = Client::all();
        $funcionarios = Employee::ativo()->get();

        return view('projetos.edit', [
            'projeto' => $projeto,
            'clientes' => $clientes,
            'funcionarios' => $funcionarios
        ]);
    }

    /**
     * Atualiza o projeto no banco de dados.
     */
    public function update(ProjetoRequest $request, Project $projeto): \Redirect|RedirectResponse
    {
        $update = $projeto->atualizarComFuncionarios(
            $request->except('funcionarios'),
            $request->funcionarios
        );

        if (!$update) {
            return redirect()->back()->withInput()->withErrors(['Erro ao atualizar projeto.']);
        }

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
