@php
    $editar = old($nome, $editar ?? '');
@endphp

<div class="mb-5">
    <x-label for="{{ $nome }}" titulo="{{ $labelTitulo }}"/>
    <select id="{{ $nome }}" name="{{ $nome }}"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        <option>Selecione um item</option>
        @foreach( $lista as $item )
            <option value="{{ $item->name }}" {{ $item->name == $editar ? 'selected' : ''  }}>{{ $item->value }}</option>
        @endforeach
    </select>
</div>
