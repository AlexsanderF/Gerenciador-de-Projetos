<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Employee;
use Faker\Factory;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Controller @FuncionarioController
 */
class FuncionarioController extends Controller
{
    /**
     * Mostra a lista de funcionários
     */
    public function index(): Factory|View
    {
        $funcionarios = Employee::paginate(5);

        return view('funcionarios.index', [
            'funcionarios' => $funcionarios]);
    }

    /**
     * Mostra o formulári para criar um novo funcionário
     */
    public function create(): Factory|View
    {
        return view('funcionarios.create');
    }

    /**
     * Cria um novo funcionario no banco de dados.
     */
    public function store(FuncionarioRequest $request): RedirectResponse|Redirector
    {
        $create = Employee::criar(
            $request->only('nome', 'cpf', 'data_contratacao'),
            $request->only('logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep')
        );

        if (!$create) {
            return redirect()->back()->withInput()->withErrors('Não foi possível criar o funcionario.');
        }

        return redirect()->route('funcionarios.index')->with('success', 'Funcionario cadastrado com sucesso!');
    }

    /**
     * Mostra o formulário com os dados para edição.
     */
    public function edit(Employee $funcionario): Factory|View
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Atualiza um funcionário especifico.
     */
    public function update(FuncionarioRequest $request, Employee $funcionario): RedirectResponse|Redirector
    {
        $update = $funcionario->atualizar(
            $request->only(['nome', 'cpf', 'data_contratacao']),
            $request->only('logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep')
        );

        if (!$update) {
            return redirect()->back()->withInput()->withErrors('Erro ao atualizar o funcionario.');
        }
        return redirect()->route('funcionarios.index')->with('success', 'Funcionario atualizado com sucesso!');
    }

    /**
     * Deleta um funcionário especifico.
     */
    public function destroy(Employee $funcionario): RedirectResponse|Redirector
    {
        $delete = $funcionario->deletar();

        if (!$delete) {
            return redirect()->back()->withErrors('Erro ao deletar o funcionario.');
        }

        return redirect()->route('funcionarios.index')->with('success', 'Funcionario deletado com sucesso!');
    }
}
