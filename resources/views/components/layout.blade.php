<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{$titulo}}</title>
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

<!-- BODY DA APLICAÇÃO USANDO COMPONENTE -->
{{ $slot }}

</body>
</html>

