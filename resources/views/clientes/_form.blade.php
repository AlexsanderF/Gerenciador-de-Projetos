@csrf
<x-input nome="nome" labelTitulo="Nome do Cliente" :editar="$cliente->nome ?? ''"/>

<x-input nome="endereco" labelTitulo="Endereço do cliente" :editar="$cliente->endereco ?? ''"/>

<x-input nome="descricao" labelTitulo="Descrição do cliente" :editar="$cliente->descricao ?? ''"/>

<x-button-primary titulo="Salvar"/>
