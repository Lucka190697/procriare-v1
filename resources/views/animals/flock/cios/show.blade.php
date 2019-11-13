@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock-card')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card">
                        <div class="card-header">
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
                                            <a href="{{ route('animals.edit', $cio->id) }}"
                                               class="text-white float-right">
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            Animal:
                                            <strong> {{ $cio->animal_id }} | </strong>
                                            <strong> {{ $animal->name }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data do Cio:
                                            <strong>{{ $cio->date_animal_heat }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data da Cobertura:
                                            <strong>{{ $cio->date_coverage }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Tipo:
                                            <strong> {{ $cio->childbirth_type }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Pai:
                                            <strong> {{ $cio->father }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data do Parto Previsto:
                                            <strong> {{ $cio->date_childbirth_foreseen }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Status:
                                            <strong class="text-warning"> {{ $cio->status }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data do Parto:
                                            @if(!isset($cio->date_childbirth))
                                                <label class="text-warning">
                                                    <i class="text-warning fa fa-clock"></i>Pendente
                                                </label>
                                            @elseif($cio->status == "abortion")
                                                <label class="text-danger">
                                                    <i class="text-danger fa fa-times"></i>Aborto
                                                </label>
                                            @else
                                                <label class="text-success">
                                                    <i class="text-success fa fa-check"></i> {{$cio->date_childbirth}}
                                                </label>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            Criado em:
                                            <strong> {{$cio->created_at}} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Criado pelo usuário ID:
                                            <strong> {{ $cio->responsible_id }}</strong>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-header text-white bg-gradient-indigo">
                                            {{$animal->nome}}
                                        </div>
                                        <div class="card-body">
                                            <img src="{{asset('animals/' . $animal->thumbnail) }}"
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
