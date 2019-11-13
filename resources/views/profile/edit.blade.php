@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('profile.partials.header', [
        'title' => __('Oi') . ' '. auth()->user()->name. '!',
        'description' => __('Esta é a sua página de perfil. Você pode ver o progresso que você fez em seu trabalho e gerenciar seus projetos ou tarefas atribuídas'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">@lang('labels.Edit') @lang('labels.profile') </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">@lang('labels.User Information')</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">@lang('labels.Name')</label>
                                    <input type="text" name="name" id="input-name"
                                           class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Name') }}"
                                           value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Esse campo é necessário!</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">@lang('labels.Email')</label>
                                    <input type="email" name="email" id="input-email"
                                           class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Email') }}"
                                           value="{{ old('email', auth()->user()->email) }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Entre com um email válido</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('thumbnail') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-profile">@lang('labels.profile')</label>

                                    <input
                                            type="file"
                                            name="thumbnail"
                                            id="input-profile"
                                            class="form-control form-control-alternative{{ $errors->has('thumbnail') ? ' is-invalid' : '' }}"
                                            placeholder="{{old('thumbnail', auth()->user()->thumbnail)}}"
                                            value="{{old('thumbnail', auth()->user()->thumbnail)}}">

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
                            </div>
                        </form>
                        <hr class="my-4"/>
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">@lang('labels.Password')</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-current-password">@lang('labels.Current Password')</label>
                                    <input type="password" name="old_password" id="input-current-password"
                                           class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                           placeholder="@lang('labels.Current Password')" value="" required>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                            <strong class="text-danger">Digite a senha com no mínimo 8 caracteres!</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-password">@lang('labels.New(a)') @lang('labels.Password')</label>
                                    <input type="password" name="password" id="input-password"
                                           class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           placeholder="@lang('labels.New(a)') @lang('labels.Password')" value=""
                                           required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="input-password-confirmation">@lang('labels.Confirm New Password')
                                    </label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation"
                                           class="form-control form-control-alternative"
                                           placeholder="@lang('labels.Confirm New Password')" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-success mt-4">
                                        <i class="fa fa-lock mr-2"></i>
                                        @lang('labels.Change password')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
