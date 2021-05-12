@csrf

<div class="form-group row">
    <label for="foto_capa" class="col-md-4 col-form-label text-md-right">{{ __('Foto Capa') }}</label>

    <div class="col-md-6">
        <input class="form-control{{ $errors->has('foto_capa') ? ' is-invalid' : '' }}" type="file" accept=".jpg" name="foto_capa" id="foto_capa" required>
        @if ($errors->has('foto_capa'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('foto_capa') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="codigo" class="col-md-4 col-form-label text-md-right">{{ __('Código') }}</label>

    <div class="col-md-6">
        <input id="codigo" type="text" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" value="{{ $imovel->codigo }}" required>

        @if ($errors->has('codigo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('codigo') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

    <div class="col-md-6">
        <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{ $imovel->titulo }}" required>

        @if ($errors->has('titulo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('titulo') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
    <div class="col-md-6">
        <select id="categoria"  class="form-control" name="categoria" value="{{ $imovel->categoria }}">
            <option value="">Selecione a categoria</option>
            <option value="apartamento" {{ $imovel->categoria == 'apartamento' ? 'selected ="selected"':''}} >Apartamento</option>
            <option value="casa" {{ $imovel->categoria == 'casa' ? 'selected ="selected"':''}} >Casa</option>
            <option value="terreno" {{ $imovel->categoria == 'terreno' ? 'selected ="selected"':''}} >Terreno</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>

    <div class="col-md-6">
        <input id="valor" type="text" class="form-control{{ $errors->has('valor') ? ' is-invalid' : '' }}" onKeyPress="return(moeda(this,'.',',',event))" name="valor" value="{{ $imovel->valor }}" >

        @if ($errors->has('valor'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('valor') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="observacao" class="col-md-4 col-form-label text-md-right">{{ __('Observação') }}</label>

    <div class="col-md-6">
        <textarea id="observacao" class="form-control" name="observacao" >{{ $imovel->observacao }}</textarea>
    </div>
</div>
