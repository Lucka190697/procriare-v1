@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center mb-4">
                            <small>@lang('labels.Or sign up with credentials')</small>
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                            @csrf

                            <div
                                class="form-group{{ $errors->has('name') ? ' has-danger' : 'text-danger is-invalid' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input
                                        class="text-dark form-control{{ $errors->has('name') ? ' text-danger is-invalid' : '' }}"
                                        placeholder="Seu nome" type="text" name="name" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback text-danger" style="display: block;" role="alert">
                                        <strong>
                                            Por favor entre com um nome válido com no mínimo 5 e no máximo 255 caracteres!
                                        </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-dark form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input
                                        class="text-dark form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Email') }}" type="email" name="email"
                                        value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback text-danger" style="display: block;" role="alert">
                                        <strong>
                                            Por favor insira um email válido com no máximo 255 caracteres, por exemplo
                                            meunome@gmail.com
                                        </strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-dark form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input
                                        class="text-dark form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Telefone') }}" type="text" name="phone"
                                        value="{{ old('phone') }}" id="input-phone" required>
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback text-danger" style="display: block;" role="alert">
                                        <strong>
                                            Por favor insira um número de telefone válido!
                                        </strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-dark form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input
                                        class="text-dark form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="@lang('labels.Password')" type="password" name="password"
                                        required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback text-danger" style="display: block;" role="alert">
                                        <strong>Por favor insira uma senha com no mínimo 8 caracteres!</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="text-dark form-control" placeholder="{{ __('Confirmação de senha') }}"
                                           type="password" name="password_confirmation" required>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback text-danger" style="display: block;" role="alert">
                                        <strong>As senhas devem ser exatamente iguais</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input
                                            class="custom-control-input"
                                            name="terms-check"
                                            id="customCheckRegister"
                                            type="checkbox" required>
                                        @if($errors->has('terms-check'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>Você não aceita nossos termos? Se não, você não pode prosseguir</strong>
                                            </span>
                                        @endif
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-mute">@lang('labels.I agree with the')<a
                                                    href="#"> @lang('labels.Privacy Policy')</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                        class="btn btn-block btn-primary mt-4">@lang('labels.Create Accont')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
