@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock-card')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-sm-12 mb-2 mb-lg-0 text-left">
                                <h3 class="mb-0">{{ __('Rebanho atual') }}</h3>
                            </div>
                            <div class="col-md-6 col-lg-7 mb-lg-0 mb-2">
                                <form action="{{route('animals.search')}}" id="pesquisar" method="post" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               name="search" id="search"
                                               id="search" name="search"
                                               placeholder="Pesquisar" required>
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-outline-light">
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3 col-sm-12 text-right">
                                @if($title == 'search')
                                    <a href="{{route('animals.index')}}" class="btn btn-block btn-danger">
                                        <i class="fa fa-arrow-left"></i> Voltar
                                    </a>
                                @endif
                                @if($title == 'Flock')
                                    <a href="{{ route('animals.create', $animals) }}" class="btn btn-block btn-primary">
                                        <i class="fa fa-plus mr-2"></i> Registrar novo Animal
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        @include('layouts.flash-message')
                    </div>
                    <div class="table-responsive p-lg-3">
                        <table class="table align-items-center table-flush" id="user-list-table">
                            <thead>
                            <tr>
                                @include('animals.flock.partials._head')
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($animals as $animal)
                                @if($animal->farm_id == $farm_item->auth_user)
                                    <tr>
                                        @include('animals.flock.partials._body')
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                @if($title == 'Flock')
                                    {{$animals->links()}}
                                @endif
                                @if($title == 'search')
                                    <a href="{{route('animals.index')}}" class="btn btn-sm btn-danger">
                                        <i class="fa fa-arrow-left"></i> Voltar
                                    </a>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
