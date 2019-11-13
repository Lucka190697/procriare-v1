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
                            <h1 class="text-justify">Mais uma etapa...</h1>
                            <h2>Só mais um momento</h2>
                            <p>
                                Verifique se seus dados estão corretos.
                            </p>
                            <p>
                                Agora que você já tem uma fazenda cadastrada, você
                                pode personalizar seus dados.
                            </p>
                            <h2>Personalize sua imagem de perfil</h2>
                            <p>
                                Escolha uma imagem para te identificar no sistema
                                e para você poder cadastrar novos animais.<br>
                                Se não quiser, pode deixar em branco.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5 text-darker">
                        <h2>Conferindo...</h2>
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">
                                Conclua seu perfil e confira se tudo está certo
                            </h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">
                                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                                    @lang('labels.Name')
                                </label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user -3"></i></span>
                                    </div>
                                    <input type="text" name="name" id="input-name"
                                           class="text-dark form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Name') }}"
                                           value="{{ old('name', auth()->user()->name) }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>Esse campo é necessário!</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">
                                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i>
                                    </sup>@lang('labels.Email')
                                </label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-mail-bulk -3"></i></span>
                                    </div>
                                    <input type="email" name="email" id="input-email"
                                           class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Email') }}"
                                           value="{{ old('email', auth()->user()->email) }}">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>Entre com um email válido</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('thumbnail') ? ' has-danger' : '' }}">
                                <label class="form-control-label"
                                       for="input-profile">
{{--                                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i>--}}
                                    @lang('labels.profile')
                                </label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-images -3"></i></span>
                                    </div>
                                    <input
                                        type="file"
                                        name="thumbnail"
                                        id="input-profile"
                                        class="form-control form-control-alternative{{ $errors->has('thumbnail') ? ' is-invalid' : '' }}"
                                        placeholder="{{old('thumbnail', auth()->user()->thumbnail)}}"
                                        value="{{old('thumbnail', auth()->user()->thumbnail)}}">
                                </div>
                                @if ($errors->has('thumbnail'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">Por favor entre com um arquivo de imagem no formato .jpg, .jpeg ou .png </strong>
                                        </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-success mt-4">
                                    <i class="fa fa-save mr-2"></i>@lang('labels.Save')</button>
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
