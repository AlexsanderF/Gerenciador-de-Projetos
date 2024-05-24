<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $titulo }}</title>
</head>
<body>
<nav class="bg-gray-300">
    <div class="container mx-auto flex items-center justify-between p-4">
        <a href="/" class="text-2xl font-semibold">Treinaweb</a>

        <ul class="font-medium flex">
            <li class="px-4">
                <a href="{{route('clientes.index')}}">Lista de Clientes</a>
            </li>
        </ul>
    </div>
</nav>

<!-- ERROS DE VALIDAÇÕES, SE HOUVER. -->
@if ($errors->any())
    <div class="flex justify-between items-center p-2 bg-red-500 text-white border-2 border-red-500 rounded-sm">
        <span class="text-xs">Erros de validação</span>
        <ul class="flex flex-col mt-1">
            @foreach($errors->all() as $error)
                <li class="text-sm text-center">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- FLASH MENSAGEM -->
@if(session('mensagem'))
    <div class="text-xl-center p-2 bg-green-500 text-black border-2 border-green-500 rounded-sm text-center">
        {{ session('mensagem') }}
    </div>
@endif
<div class="container mx-auto">
    <h1 class="text-4xl font-bold text-center my-4">
        {{ $titulo }}
    </h1>
    <!-- BODY DA APLICAÇÃO USANDO COMPONENTE -->
    {{ $slot }}
</div>
@stack('scripts')
</body>
</html>

