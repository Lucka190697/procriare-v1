<td>
    <a href="{{route('animals.show', $cio->animal_id)}}">
        {{$cio->animal_id}}
    </a>
</td>
<td>{{$cio->date_animal_heat}}</td>
<td>{{$cio->date_coverage}}</td>
<td>
    @if($cio->tipo == "insemination")
        IA
    @else
        Natural
    @endif
</td>
<td>{{$cio->father}}</td>
<td>{{$cio->date_childbirth_foreseen}}</td>
<td class="text-center">
    @if($cio->status == "pending")
        <h2><i class="text-warning fa fa-clock"></i><br></h2>
        Pendente
    @endif
    @if($cio->status == "success")
        <h2><i class="text-success fa fa-check-circle"></i><br></h2>
        Sucesso
    @endif
    @if($cio->status == "abortion")
        <h2><i class="text-danger fa fa-exclamation-triangle"></i><br></h2>
        Falha
    @endif
</td>
<td>
    @if(!isset($cio->date_childbirth))
        Pendente
    @endif
</td>
<td>
    <div class="dropdown">
        <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            <i class="fa fa-list"></i>
        </button>
        @include('animals.flock.cios.partials._actionButton')
    </div>
</td>

