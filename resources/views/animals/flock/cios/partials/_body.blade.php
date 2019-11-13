<td>
    <a href="{{route('animals.show', $cio->animal_id)}}">
        {{$cio->animal_id}}
    </a>
</td>
<td>
    {{$cio->date_animal_heat = date('d/m/Y', strtotime($cio->date_animal_heat))}}
</td>
<td>
    @if($cio->tipo == "insemination")
        IA
    @else
        Natural
    @endif
</td>
<td>{{$cio->father}}</td>
<td class="text-indigo">
{{$cio->date_childbirth_foreseen = date('d/m/Y', strtotime($cio->date_childbirth_foreseen))}}
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
    @if($cio->status == "cleaning")
        <h2><i class="text-cyan fa fa-brush"></i><br></h2>
        Cio de Limpeza
    @endif
</td>
<td>
    @if($cio->status == "pending")
        <h2><i class="text-warning fa fa-clock"></i><br></h2>
        Pendente
    @elseif($cio->status == "abortion")
        <h2><i class="text-danger fa fa-times"></i><br></h2>
        Aborto
    @elseif($cio->status == "cleaning")
        <h2><i class="text-indigo fa fa-times"></i><br></h2>
        Cio de Limpeza
    @elseif($cio->status == "success")
        @if(isset($cio->date_childbirth))
            <h2><i class="text-success fa fa-check"></i></h2>
            {{$cio->date_childbirth = date('d/m/Y', strtotime($cio->date_childbirth))}}
        @endif
    @endif
</td>
<td>
    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle"
                type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            <i class="fa fa-list"></i>
        </button>
        @include('animals.flock.cios.partials._actionButton')
    </div>
</td>

