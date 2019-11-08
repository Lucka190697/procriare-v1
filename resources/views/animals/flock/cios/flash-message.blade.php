<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <div class="alert alert-info text-left">
                <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a>
                @foreach ($cios as $cio)
                @endforeach
                @if(isset ($cio))
                    <p> O Registro de {{$cio->id}} foi registrado!</p>
                    <p> Parto Previsto para: {{$cio->dt_parto_previsto}} </p>
                    <p> Status do Cio: {{$cio->status}} </p>
                @endif
            </div>
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