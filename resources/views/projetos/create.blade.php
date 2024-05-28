<x-layout titulo="Criar Projeto">
    <form method="post" action="{{ route('projetos.store') }}" class="max-w-6xl mx-auto">
        @include('projetos._form')
    </form>
</x-layout>
