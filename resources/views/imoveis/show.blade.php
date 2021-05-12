@extends('layouts.dashboard')
@section('content')
<div class="conteudo_painel">
    <div class="conteudo_painel_int">
            <ul class="nav nav-pills" role="tablist">
                <li><a class="btn btn-primary" href="{{ route('imoveis.index') }}">Voltar</a></li>
            </ul>
    </div>
    <hr />
        <div class="row">
            <div class="col-md-8">
                <h1>Dados dos Clientes</h1><br>
                <hr />
                <div class="form-group row">
                    <label for="cnpj" class="col-md-4 col-form-label text-md-right">{{ __('NOME') }}</label>

                    <div class="col-md-6">
                        {{ $cliente->nome }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="razao_social" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                    <div class="col-md-6">
                        {{ $cliente->cpf }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nascimento" class="col-md-4 col-form-label text-md-right">{{ __('DATA DE NASCIMENTO') }}</label>

                    <div class="col-md-6">
                        {{ $cliente->nascimento }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('ENDEREÇO') }}</label>

                    <div class="col-md-6">
                    {{ $cliente->endereco }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-MAIL') }}</label>

                    <div class="col-md-6">
                        {{ $cliente->email }}
                    </div>

                </div>

                <div class="form-group row">
                    <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('TELEFONE/WHATSAPP') }}</label>

                    <div class="col-md-6">
                        {{ $cliente->telefone }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="planos" class="col-md-4 col-form-label text-md-right">{{ __('PLANOS') }}</label>

                    <div class="col-md-6">
                        {{ $cliente->planos }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fotof" class="col-md-4 col-form-label text-md-right">{{ __('FOTO DOCUMENTO FRENTE') }}</label>
                    <div class="col-md-6">
                        <img src="{!! asset($cliente->fotof) !!}" width="500" heigth="400"/>
                        <a href="{{ route('download', [$cliente->id,'1']) }}" target="_blank" class="btn btn-danger">Download</a>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fotov" class="col-md-4 col-form-label text-md-right">{{ __('FOTO DOCUMENTO VERSO') }}</label>
                    <div class="col-md-6">
                        <img src="{!! asset($cliente->fotov) !!}" width="500" heigth="400"/>
                        <a href="{{ route('download', [$cliente->id, '2']) }}" target="_blank" class="btn btn-danger">Download</a>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="assinatura" class="col-md-4 col-form-label text-md-right">{{ __('ASSINATURA') }}</label>
                    <div class="col-md-6">
                        <img src="{!! asset($cliente->signature) !!}" width="500" heigth="400"/>
                        <a href="{{ route('download', [$cliente->id,'3']) }}" target="_blank" class="btn btn-danger">Download</a>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="obs" class="col-md-4 col-form-label text-md-right">{{ __('OBSERVAÇOES') }}</label>

                    <div class="col-md-6">
                        {{ $cliente->obs }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
