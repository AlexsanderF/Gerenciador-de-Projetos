<x-layout titulo="Criar Clientes">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center my-4">
            Cadastrar novo Cliente
        </h1>
        <form method="post" action="{{ route('clientes.store') }}" class="max-w-6xl mx-auto">
            @csrf
            <div class="mb-5">
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                    Nome do cliente
                </label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                    Endereço do cliente
                </label>
                <input type="text" id="endereco" name="endereco" value="{{ old('endereco') }}"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                    Descrição do cliente
                </label>
                <input type="text" id="descricao" name="descricao" value="{{ old('descricao') }}"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cadastrar Cliente
            </button>
        </form>
    </div>
</x-layout>
