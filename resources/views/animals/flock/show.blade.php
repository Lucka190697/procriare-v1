@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock-card')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-7 float-lg-left">
                                <h3>Status:
                                    @if($animals->status == 'ativo')
                                        <h3 class="text-primary">Ativo</h3>
                                    @elseif($animals->status == 'vendido')
                                        <h3 class="text-warning">Vendido</h3>
                                    @elseif($animals->status == 'morto')
                                        <h3 class="text-danger">Morto</h3>
                                    @endif
                                </h3>
                            </div>
                            <div class="col-5 float-lg-right">
                                <a href="{{ route('animals.create') }}"
                                   class="btn btn-primary float-right">
                                    Cadastrar outro
                                    <i class="fa fa-redo ml-3"></i>
                                </a>
                                <a href="{{ route('animals.index') }}"
                                   class="btn btn-outline-primary float-right mr-2">
                                    <i class="fa fa-chevron-left mr-2"></i>
                                    Voltar
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6 float-lg-left">
                                        <ul class="list-group">
                                            @if($animals->status == 'ativo')
                                                <li class="list-group-item active">
                                            @elseif($animals->status == 'vendido')
                                                <li class="list-group-item bg-warning text-white">
                                            @elseif($animals->status == 'morto')
                                                <li class="list-group-item bg-danger text-white">
                                                    @endif

                                                    ID: <strong> {{ $animals->id }} </strong>
                                                    @if($animals->sex == 'femeale')
                                                        <strong class="ml-3">
                                                            <i class="fa fa-venus"></i>
                                                            {{$animals->sex}}
                                                        </strong>
                                                    @elseif($animals->sex == 'male')
                                                        <strong class="ml-3"><i class="fa fa-mars"></i></strong>
                                                    @endif
                                                    <a href="{{ route('animals.edit', $animals->id) }}"
                                                       class="text-white float-right">
                                                        <i class="fa fa-edit"></i> Editar
                                                    </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <img src="{{ asset('animals/' . $animals->thumbnail) }}"
                                                         alt="image" width="500" height="auto" class="img-thumbnail">
                                                </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 float-lg-right">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                Nome:
                                                <strong>{{ $animals->name }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Idade:
                                                <strong>{{ $animals->idade }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Data de Nascimento:
                                                <strong>{{ $animals->born_date }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Pai:
                                                <strong>{{ $animals->father }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Mãe:
                                                <strong>{{ $animals->mother }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Classificação:
                                                <strong>{{ $animals->class }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Raça:
                                                <strong>{{ $animals->breed }}</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Criado em:
                                            <strong>{{$animals->created_at}}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            Última modificação:
                                            <strong>{{ $animals->updated_at }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            Criado por:
                                            <strong>{{ $animals->responsible_id }}</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection
