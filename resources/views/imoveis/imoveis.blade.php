@extends('layouts.dashboard')
@section('content')
<div class="conteudo_painel" id="list">
    <div class="conteudo_painel_int">
        <ul class="nav nav-pills" role="tablist">
            <li><a class="btn btn-primary" href="{{ route('imoveis.create') }}">Novo</a></li>
        </ul>
    <hr />
        <form method="POST" action="{{route('pesquisar')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="buscar" class="col-md-1 col-form-label text-md-right">{{ __('Pesquisar') }}</label>

                <div class="col-md-6">
                    <input id="keyword" type="text" class="form-control" name="buscar">
                </div>
                <button class="btn btn-primary" id="search">
                    Buscar
                </button>
            </div>
        </form>
        <div class="row well well-sm">
            <div class="col-sm-2">
                <p>Código</p>
            </div>
            <div class="col-sm-3">
                <p>Titulo</p>
            </div>

            <div class="col-sm-3">
                <p>Categoria</p>
            </div>

            <div class="col-sm-3">
                <p>Valor</p>
            </div>

            <div class="col-sm-1">
                <p>Ações</p>
            </div>
        </div>

    @foreach( $imoveis as $imovel)
        <div class="row well well-sm">
            <div class="col-sm-2">
                <p>{{$imovel->codigo}}</p>
            </div>
            <div class="col-sm-3">
                <p>{{$imovel->titulo}}</p>
            </div>

            <div class="col-sm-3">
                <p>{{$imovel->categoria}}</p>
            </div>

            <div class="col-sm-3">
                <p>{{$imovel->valor}}</p>
            </div>

            <div class="col-sm-1">
                <p><a class="btn btn-primary" href="{{ route('imoveis.edit', [$imovel->id]) }}">Alterar</a></p>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
