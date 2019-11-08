@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    <div class="col-md-12 col-lg-7 float-left">
                        @include('event.calendar')
                    </div>

                    <div class="col-md-12 col-lg-5 float-right">
                        <div class="card border border-bottom-0 border-primary">
                            <div class="card-header">
                                <i class="fa fa-star"></i>
                                Acesso Rápido
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div>
                                        <div class="col-7 col-lg-8 float-left">
                                            <span> Próximos Nascimentos: </span>
                                        </div>
                                        <div class="col-5 col-lg-4 float-right">
                                            <a class="btn-sm btn-primary" href="#">
                                                Ver todos
                                            </a>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <table class="table table-hover table-responsive">
                                            <tr>
                                                <th>Vaca</th>
                                                <th>Previsão</th>
                                                <th>Status</th>
                                            </tr>
                                            <tr>
                                                <td>Sinfra</td>
                                                <td>07/06/2019</td>
                                                <td class="bg-danger text-white">
                                                    <i class="fa fa-exclamation"></i>
                                                    Amanhã
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Filó</td>
                                                <td>05/11/2019</td>
                                                <td class="bg-warning text-white">
                                                    <i class="fa fa-stop"></i>
                                                    pendente
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!--
                                    <div class="card">
                                        <div class="card-header">
                                            eventos importantes!
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover table table-responsive">
                                                <tr>
                                                    <th>Evento</th>
                                                    <th>Data</th>
                                                    <th>Animal</th>
                                                    <th>Operaçao</th>
                                                    <th>Status</th>
                                                </tr>
                                                <tr>
                                                    <td>Vacinação Aftosa</td>
                                                    <td>07/06/2019</td>
                                                    <td>Todo o Rebanho</td>
                                                    <td>Vacinação de Imunização</td>
                                                    <td class="bg-warning text-white">
                                                        <i class="fa fa-exclamation"></i>
                                                        Pendente
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tratamento de Parasitas</td>
                                                    <td>07/06/2019</td>
                                                    <td>Lactantes</td>
                                                    <td>Tratamento curativo</td>
                                                    <td class="bg-warning text-white">
                                                        <i class="fa fa-exclamation"></i>
                                                        Pendente
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-150">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <h1></h1>
            </div>
        </div>
    </div>
    {{--</div>--}}
    @include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush