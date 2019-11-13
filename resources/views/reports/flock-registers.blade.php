<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Favicon -->
    <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- datatables -->
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
{{--    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">--}}
<!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

</head>
<body class="bg-gradient-default">

<h1>Este é um relatório de todos os seus animais de sua fazenda.</h1>
<p>
    Com esse arquivo, você pode ter os dados de seu
    rebanho em papel impresso
</p>
<h2>Conferindo...</h2>
<style type="text/css">
    body{
        background-color: #0c1628;
        text-decoration-color: #ffffff;
    }
    table{
        ;
    }
</style>
<table width="100">
    <thead>
    <tr>
        <th>perfil</th>
        <th>ID</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Sexo</th>
        <th>Classisficação</th>
        <th>Status</th>
        <th></th>
    </tr>
    @foreach ($animals as $animal)
        @if($animal->farm_id == $farm_item->auth_user)
            <tr>
                <td>
                    <img src="{{asset('animals/' . $animal->thumbnail) }}"
                         alt="image"
                         width="50"
                         height="50"
                         class="rounded">
                </td>
                <td> {{ $animal->id }}</td>
                <td> {{$animal->name }} </td>
                <td> {{$animal->born_date }} </td>
                <td>@if ($animal->sex == 'femeale')
                        <i class="fa fa-venus"></i>
                        <span>F</span>
                    @else <i class="fa fa-mars"></i>
                        <span>M</span>
                    @endif
                </td>
                <td>{{ $animal->class }}</td>
                @if($animal->status == 'ativo')
                    <td class="text-success text-uppercase">
                        {{ $animal->status }} </td>
                @elseif($animal->status == 'morto')
                    <td class="text-danger text-uppercase">
                        {{ $animal->status }} </td>
                @elseif($animal->status == 'vendido')
                    <td class="text-warning text-uppercase">
                        {{ $animal->status }} </td>
                @endif
                <td class="btn-group">@include('animals.flock.partials._actionButton')</td>
            </tr>
        @endif
    @endforeach
    </thead>
</table>
</body>
</html>
