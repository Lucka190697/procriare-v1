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
            @if($item_animal->farm_id == $farm_item->auth_user)
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
                            <i class="text-warning fa fa-clock"></i>
                        @elseif($cio->status == 'success')
                            <i class="text-success fa fa-check"></i>
                        @elseif($cio->status == "cleaning")
                            <i class="text-indigo fa fa-times"></i>
                        @elseif($cio->status == 'abortion')
                            <i class="text-danger fa fa-exclamation-triangle"></i>
                        @endif
                    </td>
                    <td class="btn-group">
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fa fa-eye mr-2"></i>Ver</a>
                        <a href="{{route('cio.edit', $cio->id)}}" class="btn btn-sm btn-success">
                            <i class="fa fa-list mr-2"></i>Editar</a>
                        {{--                    <a href="#" class="btn btn-sm btn-default">Adiar</a>--}}
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
</div>
