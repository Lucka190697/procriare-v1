<div class="table-responsive">
    <table class="table table-responsive text-center">
        <tr>
            <th>Cod. cio</th>
            <th>Animal</th>
            <th>Data do Cio</th>
            <th>Parto Previsto</th>
            <th>Status</th>
            <th>Operações</th>
        </tr>
        @foreach($cios as $cio)
            @if($cio->responsible_id == auth()->user()->farm_id)
                <tr>
                    <td>{{$cio->id}}</td>
                    <td>{{$item_animal->name}}</td>
                    <td>
                        {{$cio->date_animal_heat = date('d/m/Y', strtotime($cio->date_animal_heat))}}
                    </td>
                    <td class="text-indigo">
                        {{$cio->date_childbirth_foreseen = date('d/m/Y', strtotime($cio->date_childbirth_foreseen))}}
                    </td>
                    <td>
                        @if($cio->status == 'pending')
                            <i class="text-warning fa fa-clock mr-2"></i>
                            Pendente...
                        @elseif($cio->status == 'success')
                            <i class="text-success fa fa-check mr-2"></i>
                            Sucesso!
                        @elseif($cio->status == "cleaning")
                            <i class="text-indigo fa fa-times mr-2"></i>
                            Cio de Limpeza
                        @elseif($cio->status == 'abortion')
                            <i class="text-danger fa fa-exclamation-triangle mr-2"></i>
                            Aborto!
                        @endif
                    </td>
                    <td class="btn-group">
                        @if($cio->status == 'success')
                            <a href="{{route('animals.create')}}" class="btn btn-sm btn-success">
                                <i class="fa fa-plus mr-2"></i>Registrar Bezerro</a>
                        @else
                            <a href="{{route('cio.edit', $cio->id)}}" class="btn btn-sm btn-success">
                                <i class="fa fa-pencil-alt mr-2"></i>Editar</a>
                        @endif
                        <a href="{{route('animals.show', $cio->id)}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-list mr-2"></i>Detalhes</a>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</div>
