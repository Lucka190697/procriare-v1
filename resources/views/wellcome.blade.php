@extends('layouts.app', ['class' => 'bg-gradient-dark'])

@section('content')
    <div class="bg-gradient-primary"
         style="background-image: url('../../public/argon/agricultura-animal-area-4222118.jpg');">
        <div class="header py-7 py-lg-8"
             style="background-color: rgba(0,0,0,0.05)">
            <div class="container">
                <div class="header-body text-center mt-7 mb-7">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <img class="img-fluid" src="{{asset('/argon/img/brand/112232.png')}}"
                                 width="450" height="auto">
                            <br>
                            <h2 class="text-white">Seu Rebanho bem cuidado</h2>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <!--
                            <div class="text-right m-2">
                                <h3 class="text-white">
                                    <i class="fa fa-sticky-note"></i>
                                    <a>Notas da Versão</a>
                                </h3>
                                <h3 class="text-white">
                                    <i class="fa fa-info-circle"></i>
                                    <a>Sobre Nós</a>
                                </h3>
                                <h3 class="text-white">
                                    <i class="fa fa-users"></i>
                                    <a>Seja um membro</a>
                                </h3>
                                <h3 class="text-white">
                                    <i class="fa fa-grin-hearts"></i>
                                    <a>Contribuir com nosso projeto</a>
                                </h3>
                            </div>
                            -->
                            {{--<h1 class="text-white"><i class="fa fa-key"></i></h1>--}}
                            <div class="col-12 mb-2 text-left">
                                <label class="text-white"> Já Possui uma conta? </label>
                                <a class="btn btn-block btn-white" href="{{ route('login') }}">
                                    <h1>Fazer Login</h1>
                                </a>
                            </div>
                            <div class="col-12 text-left">
                                <label class="text-white"> Ainda não tem? </label>
                                <a class="btn btn-block btn-white" href="{{ route('register') }}">
                                    <h1>Registre-se</h1>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                     xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-darker" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
