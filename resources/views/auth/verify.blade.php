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

    <div class="card-body px-lg-5 py-lg-5 text-darker">
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h1>
                                    <i class="fa fa-mail-bulk"></i></h1>
                                <h2>Verifique seu endereço de email</h2>
                            </div>
                            <div>
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        Um novo link de verificação foi enviado para o seu endereço de e-mail
                                    </div>
                                @endif
                                Antes de prosseguir, verifique seu e-mail para uma verificação
                                ligação
                                @if (Route::has('verification.resend'))
                                    Se voce ainda nao recebeu o email, <a
                                        href="{{ route('verification.resend') }}">clique aqui para
                                        requisitar um novo</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-dark">
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

