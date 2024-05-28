@csrf
<x-input nome="nome" labelTitulo="Nome do Projeto" :editar="$projeto->nome ?? ''"/>

<x-input nome="orcamento" labelTitulo="Orçamento" :editar="$projeto->orcamento ?? ''"/>

<x-input nome="data_inicio" labelTitulo="Data de inicio do projeto" :editar="$projeto->data_inicio ?? ''"/>

<x-input nome="data_final" labelTitulo="Data final do projeto" :editar="$projeto->data_final ?? ''"/>

<x-input nome="client_id" labelTitulo="Selecione o cliente" :editar="$projeto->client_id ?? ''"/>

<x-button-primary titulo="Salvar"/>
