<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Employee;

/**
 * Controller @FuncionarioController
 */
class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Employee::paginate(5);

        return view('funcionarios.index', [
            'funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FuncionarioRequest $request)
    {
        $create = Employee::criar(
            $request->only('nome', 'cpf', 'data_contratacao'),
            $request->only('logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep')
        );

        if (!$create) {
            return redirect()->back()->withErrors('Não foi possível criar o funcionario.');
        }

        return redirect()->route('funcionarios.index')->with('success', 'Funcionario cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FuncionarioRequest $request, Employee $funcionario)
    {
        $update = $funcionario->atualizar(
            $request->only(['nome', 'cpf', 'data_contratacao']),
            $request->only('logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep')
        );

        if (!$update) {
            return redirect()->back()->withErrors('Erro ao atualizar o funcionario.');
        }
        return redirect()->route('funcionarios.index')->with('success', 'Funcionario atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $funcionario)
    {
        $delete = $funcionario->deletar();

        if (!$delete) {
            return redirect()->back()->withErrors('Erro ao deletar o funcionario.');
        }

        return redirect()->route('funcionarios.index')->with('success', 'Funcionario deletado com sucesso!');
    }
}
