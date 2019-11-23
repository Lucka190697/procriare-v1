@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Editar Usuário')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Gerenciamento de usuários</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
                                    <i class="fa fa-arrow-left mr-2"></i>@lang('labels.Back')</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.user.update', $user->id) }}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">Informações</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">@lang('labels.Name')</label>
                                    <input type="text" name="name" id="input-name"
                                           class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Nome') }}" value="{{ old('name', $user->name) }}"
                                           required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">@lang('labels.Email')</label>
                                    <input type="email" name="email" id="input-email"
                                           class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}"
                                           required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone">{{ __('Telefone') }}</label>
                                    <input type="text" name="phone" id="input-phone"
                                           class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('Telefone') }}" value="{{ old('phone', $user->phone) }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                            <strong>Insira um numero de telefone valido!</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                           for="input-password">@lang('labels.Password')</label>
                                    <input type="password" name="password" id="input-password"
                                           class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           placeholder="@lang('labels.Password')" value="">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="input-password-confirmation">@lang('labels.Confirm Password')</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation"
                                           class="form-control form-control-alternative"
                                           placeholder="@lang('labels.Confirm Password')" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"
                                           for="input-thumbnail">Imagem de perfil</label>
                                    <input type="file" name="thumbnail" id="input-thumbnail"
                                           class="form-control form-control-alternative"
                                           placeholder="@lang('labels.thumbnail')">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">
                                        <i class="fa fa-save mr-2"></i>@lang('labels.Save')
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
