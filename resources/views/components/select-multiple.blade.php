@php
    $editar = old($nome, $editar ?? '');
@endphp

<div class="mb-5">
    <x-label for="{{ $nome }}" titulo="{{ $labelTitulo }}"/>
    <select multiple id="{{ $nome }}" name="{{ $nome }}[]"
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        @foreach( $items as $item )
            <option
                    value="{{ $item->$itemID }}" {{ in_array($item->$itemID, $editar) ? 'selected' : ''  }}>{{ $item->$itemDesc }}
            </option>
        @endforeach
    </select>
</div>
