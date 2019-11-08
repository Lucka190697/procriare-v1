@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock-card')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-sm-12 mb-5 mb-lg-0 text-left">
                                <h3 class="mb-0">{{ __('Editar Animal') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mx-5">
                        <form class="form-horizontal"
                              method="POST"
                              enctype="multipart/form-data"
                              name="user-form"
                              action="{{ route('animals.update', $animals) }}">
                        @method('PUT')
                        @include('animals.flock.partials._edit-form')
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-lg" type="submit">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
