@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock-card')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('flock.create') }}"
                               class="btn btn-primary float-right">
                                Cadastrar outro
                                <i class="fa fa-redo ml-3"></i>
                            </a>
                            <a href="{{ route('flock.index') }}"
                               class="btn btn-outline-primary float-right mr-2">
                                <i class="fa fa-chevron-left mr-2"></i>
                                Voltar
                            </a>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-8 col-sm">
                                    <ul class="list-group">
                                        <li class="list-group-item bg-gradient-indigo text-white">
                                            Cio Nº: <strong> <?php echo $cio->id ?> </strong>
                                            <a href="{{ route('flock.edit', $cio->id) }}"
                                               class="text-white float-right">
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            Animal:
                                            <strong> {{ $cio->id_animals }},</strong>
                                            <strong> {{ $animal->nome }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data do Cio:
                                            <strong>{{ $cio->dt_cio }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data da Cobertura:
                                            <strong>{{ $cio->dt_cobertura }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Tipo:
                                            <strong> {{ $cio->tipo }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Pai:
                                            <strong> {{ $cio->pai }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data do Parto Previsto:
                                            <strong> {{ $cio->dt_parto_previsto }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Status:
                                            <strong class="text-warning"> {{ $cio->status }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data do Parto:
                                            <label class="text-warning">{{$cio->dt_parto}}...</label>
                                        </li>
                                        <li class="list-group-item">
                                            Criado em:
                                            <strong> <?php echo $cio->created_at ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Criado pelo usuário ID:
                                            <strong> <?php echo $cio->created_by ?> </strong>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-header text-white bg-gradient-indigo">
                                            {{$animal->nome}}
                                        </div>
                                        <div class="card-body">
                                            <img src="<?php echo asset('animals/' . $animal->profile) ?>"
                                                 alt="image"
                                                 width="250"
                                                 height="auto">
                                        </div>
                                    </div>
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
