<!DOCTYPE html>
<head>
</head>
<body>

<h1>Este é um relatório de todos os seus animais de sua fazenda.</h1>
<p>
    Com esse arquivo, você pode ter os dados de seu
    rebanho em papel impresso
</p>
<h2>Conferindo...</h2>
<table>
    <thead>
    <tr>
        <th>perfil</th>
        <th>ID</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Sexo</th>
        <th>Classisficação</th>
        <th>Status</th>
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
            </tr>
        @endif
    @endforeach
    </thead>
</table>
</body>
</html>
