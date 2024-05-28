<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo 'estou aqui';
    }

    /**
     * Mostra o formulário para criar um novo projetos.
     */
    public function create(): View|Factory
    {
        return view('projetos.create');
    }

    /**
     * Cria um novo projetos no banco de dados.
     */
    public function store(Request $request): \Redirect|RedirectResponse
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
