<x-layout titulo="Editar Projeto">
    <form method="post" action="{{ route('projetos.update', $projeto->id) }}" class="max-w-6xl mx-auto">
        @method('PUT')
        @include('projetos._form')
    </form>
</x-layout>
