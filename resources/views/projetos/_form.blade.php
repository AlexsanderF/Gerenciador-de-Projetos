@csrf
<x-input nome="nome" labelTitulo="Nome do Projeto" :editar="$projeto->nome ?? ''"/>

<x-input nome="orcamento" labelTitulo="Orçamento" :editar="$projeto->orcamento ?? ''"/>

<x-input nome="data_inicio" labelTitulo="Data de inicio do projeto" :editar="$projeto->data_inicio ?? ''"/>

<x-input nome="data_final" labelTitulo="Data final do projeto" :editar="$projeto->data_final ?? ''"/>

<x-select nome="client_id" labelTitulo="Selecione o projeto" itemID="id" itemDesc="nome"
          :editar="$projeto->client_id ?? ''"
          :items="$clientes"/>

<x-button-primary titulo="Salvar"/>

@push('scripts')
    <script src="https://unpkg.com/imask"></script>
    <script>
        let data = '00/00/0000'
        IMask(document.getElementById('data_inicio'), {
            mask: data,
            lazy: false,
            placeholder: data
        });
        IMask(document.getElementById('data_final'), {
            mask: data,
            lazy: false,
            placeholder: data
        })
    </script>
@endpush
