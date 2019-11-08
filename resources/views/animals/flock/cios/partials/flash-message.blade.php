<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @foreach ($cios as $cio)
        @endforeach
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
            <p> Parto Previsto para: {{$cio->dt_parto_previsto}} </p>
            <p> Status do Cio: {{$cio->status}} </p>
            <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a>
            </p>
        @endif
    @endforeach
</div>
<div class="flash-message">
    @if ($errors->any())
        <div class="alert alert-danger">
            <p>Oops! algo deu errado!!</p>
            <p>{{$errors}}</p>
        </div>
    @endif
</div>