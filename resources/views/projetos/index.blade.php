<x-layout titulo="Lista de Projetos">
    <div class="container mx-auto">
        <div class="flex justify-end my-3">
            <a class="bg-green-500 border rounded-md p-1 px-3 text-white"
               href="{{route('projetos.create')}}">Criar Projeto</a>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Orçamento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data Inicio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Data Final
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cliente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse( $projetos as $projeto )
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('projetos.show', $projeto) }}">{{ $projeto->nome }}</a>
                        </th>
                        <td class="px-6 py-4">
                            {{ $projeto->orcamento }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $projeto->data_inicio }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $projeto->data_final }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $clientes->find($projeto->client_id)->nome }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('projetos.edit', $projeto->id) }}"
                               class="bg-blue-500 border rounded-md p-1 px-3 text-black">
                                Editar
                            </a>
                            <form method="post" action="{{ route('projetos.destroy', $projeto->id) }}">
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
                            <pre>Nenhum Projeto Cadastrado</pre>
                        </th>
                        <td></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="my-2">
                {{ $projetos->links() }}
            </div>
        </div>
    </div>
</x-layout>

