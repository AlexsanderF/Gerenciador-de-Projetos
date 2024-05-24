<x-layout titulo="Lista de Funcionários">
    <div class="container mx-auto">
        <div class="flex justify-end my-3">
            <a class="bg-green-500 border rounded-md p-1 px-3 text-white"
               href="{{route('funcionarios.create')}}">Criar Funcionário</a>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CPF
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Endereço
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($funcionarios as $funcionario)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $funcionario->nome }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $funcionario->cpf }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $funcionario->address->endereco_completo }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}"
                               class="bg-blue-500 border rounded-md p-1 px-3 text-black">
                                Editar
                            </a>
                            <form method="post" action="{{ route('funcionarios.destroy', $funcionario->id) }}">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Deseja realmente apagar o cliente?')"
                                        class="bg-red-500 border rounded-md my-2 p-1 px-3 text-black">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td></td>
                        <td></td>
                        <th class="p-4">
                            <pre>Nenhum Funcionário Cadastrado</pre>
                        </th>
                        <td></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="my-2">
                {{ $funcionarios->links() }}
            </div>
        </div>
    </div>
</x-layout>

