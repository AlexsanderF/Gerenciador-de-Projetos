@csrf
<fieldset class="border rounded-lg p-6 mb-4">
    <legend class="font-bold">Dados Pessoais</legend>
    <x-input nome="nome" labelTitulo="Nome do Funcionário" :editar="$funcionario->nome ?? ''"/>

    <x-input nome="cpf" labelTitulo="CPF do Funcionário" :editar="$funcionario->cpf ?? ''"/>

    <x-input nome="data_contratacao" labelTitulo="Data de contratação" :editar="$funcionario->data_contratacao ?? ''"/>
</fieldset>

<fieldset class="border rounded-lg p-6 mb-4">
    <legend class="font-bold">Endereço</legend>
    <x-input nome="cep" labelTitulo="CEP" :editar="$funcionario->address->cep ?? ''"/>
    <x-input nome="logradouro" labelTitulo="Logradouro" :editar="$funcionario->address->logradouro ?? ''"/>
    <x-input nome="numero" labelTitulo="Numero" :editar="$funcionario->address->numero ?? ''"/>
    <x-input nome="bairro" labelTitulo="Bairro" :editar="$funcionario->address->bairro ?? ''"/>
    <x-input nome="cidade" labelTitulo="Cidade" :editar="$funcionario->address->cidade ?? ''"/>
    <x-select nome="estado" labelTitulo="UF" :editar="$funcionario->address->estado ?? ''"
              :lista="\App\Enums\EstadosBrasileiros::cases()"/>
    <x-input nome="complemento" labelTitulo="Complemento" :editar="$funcionario->address->complemento ?? ''"/>
</fieldset>

<x-button-primary titulo="Salvar"/>

@push('scripts')
    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(document.getElementById('cpf'), {
            mask: '000.000.000-00',
            lazy: false,
            placeholder: '000.000.000.00'
        });
        IMask(document.getElementById('data_contratacao'), {
            mask: '00/00/0000',
            lazy: false,
            placeholder: '00/00/0000'
        });
        IMask(document.getElementById('cep'), {
            mask: '00.000-000',
            lazy: false,
            placeholder: '00.000-000'
        });
        IMask(document.getElementById('numero'), {
            mask: Number
        });
    </script>
@endpush
