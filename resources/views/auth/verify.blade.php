@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>@lang('labels.Verify Your Email Address')</small>
                        </div>
                        <div>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    @lang('labels.A fresh verification link has been sent to your email address.')
                                </div>
                            @endif
                            
                            @lang('labels.Before proceeding, please check your email for a verification link.')
                            
                            @if (Route::has('verification.resend'))
                                {{ __('Se voce ainda nao recebeu o email') }}, <a href="{{ route('verification.resend') }}">{{ __('clique aqui para requisitar um novo) }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
