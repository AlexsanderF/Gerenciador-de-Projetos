<x-layout titulo="Criar Clientes">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center my-4">
            Cadastrar novo Cliente
        </h1>
        <form method="post" action="{{ route('clientes.store') }}" class="max-w-6xl mx-auto">
            @csrf
            <x-input nome="nome" labelTitulo="Nome do Cliente"/>

            <x-input nome="endereco" labelTitulo="Endereço do cliente"/>

            <x-input nome="descricao" labelTitulo="Descrição do cliente"/>

            <x-button-primary titulo="Cadastrar Cliente"/>
        </form>
    </div>
</x-layout>
