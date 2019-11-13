<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Favicon -->
    <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>
<body class="bg-gradient-default">
<div class="main-content">
    @include('layouts.headers.guest')

    {{--    @include('layouts.navbars.navbar')--}}
    <div class="container mt--150 pb-0">
        <!-- Table -->
        <div class="row"><!--justify-content-center-->
            <div class="col-lg-5 col-md-8">
                <div class="text-left mb-4">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <h1 class="text-justify">Cadastre sua Fazenda</h1>
                            <h2>Mais uma etapa</h2>
                            <p>
                                Cadastre sua fazenda com os dados solicitados.
                            </p>
                            <p>
                                A partir daí, você pode adicionar um
                                funcionário para te auxiliar no gerenciamento dos animais e
                                poderá ter acesso total ao sistema
                            </p>
                            <h2> É o olho do dono que engorda o bicho né?</h2>
                            <p>
                                Ter o controle de seus animais, a atenção e o cuidado é
                                o que te faz criador.
                                Então no <strong>Procriare</strong> você tem seu rebanho na sua mão
                                e você ele vai te auxiliar pra tomar a melhor decisão para seu rebanho.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5 text-darker">
                        <h2>Fazenda</h2>
                        <form role="form" method="POST" action="{{route('admin.farm.store')}}">
                            @csrf
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="name">
                                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                                    Qual é o nome da Fazenda?
                                </label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user -3"></i></span>
                                    </div>
                                    <input class="text-dark form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="@lang('labels.Name') da Fazenda" type="text"
                                           name="name" id="name" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label class="form-control-label">
                                <h3>Onde ela fica?</h3>Preencha os campos de endereço
                                Insira o CEP e os campos de Cidade e Estado são preencidos automaticamente
                            </label>
                            <div class="text-dark form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="cep">
                                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                                    Qual é o CEP?
                                </label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-mail-bulk -83"></i>
                                        </span>
                                    </div>
                                    <input class="text-dark form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}"
                                           placeholder="CEP" type="text" name="cep" id="cep"
                                           value="{{ old('cep') }}" required>
                                </div>
                                @if ($errors->has('cep'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-dark form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="cidade">
                                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                                    Cidade
                                </label><br>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-street-view -83"></i></span>
                                    </div>
                                    <input class="text-dark form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                           placeholder="Cidade" type="text" name="city" id="cidade"
                                           value="{{ old('city') }}" required>
                                </div>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-dark form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="uf">
                                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                                    Estado
                                </label><br>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        {{--<label for="uf"> Estado </label>--}}
                                        <span class="input-group-text"><i class="fa fa-flag -83"></i></span>
                                    </div>
                                    <select class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}"
                                            name="state" id="uf" required>
                                        <option selected>Estado</option>
                                        <option value="AC">AC - Acre</option>
                                        <option value="AL">AL - Alagoas</option>
                                        <option value="AP">AP - Amapá</option>
                                        <option value="AM">AM - Amazonas</option>
                                        <option value="BH">BH - Bahia</option>
                                        <option value="CE">CE - Ceará</option>
                                        <option value="DF">DF - Distrito Federal</option>
                                        <option value="ES">ES - Espírito Santo</option>
                                        <option value="GO">GO - Goiás</option>
                                        <option value="MA">MA - Maranhão</option>
                                        <option value="MT">MT - Mato Grosso</option>
                                        <option value="MS">MS - Mato Grosso do Sul</option>
                                        <option value="MG">MG - Minas Gerais</option>
                                        <option value="PA">PA - Pará</option>
                                        <option value="PB">PB - Paraíba</option>
                                        <option value="PR">PR - Paraná</option>
                                        <option value="PE">PE - Pernambuco</option>
                                        <option value="PI">PI - Piauí</option>
                                        <option value="RJ">RJ - Rio de Janeiro</option>
                                        <option value="RN">RN - Rio Grande do Norte</option>
                                        <option value="RS">RS - Rio Grande do Sul</option>
                                        <option value="RO">RO - Rondônia</option>
                                        <option value="RO">RR - Roraima</option>
                                        <option value="SC">SC - Santa Catarina</option>
                                        <option value="SP">SP - São Paulo</option>
                                        <option value="SE">SE - Sergipe</option>
                                        <option value="TO">TO - Tocantins</option>
                                    </select>
                                </div>
                                @if ($errors->has('state'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-lg btn-primary mt-4">
                                    Próximo <i class="mr-2 fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-dark">
    @include('layouts.footers.auth')
</div>

<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/js/cep.js') }}"></script>
<script src="{{ asset('/js/jquery.mask.min.js' )}}"></script>
<script src="{{ asset('/js/masks.js' )}}"></script>

@stack('js')

<!-- Argon JS -->
<script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
</body>
</html>
