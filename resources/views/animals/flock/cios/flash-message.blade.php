<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            @foreach ($cios as $cio)
            @endforeach
            @if(isset($title) && $title == 'create-cio'))
            @if(isset ($cio))
                <div class="alert alert-info text-left">
                    <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a>
                    <p> O Registro de {{$cio->id}} foi registrado!</p>
                    <p> Parto Previsto para: {{$cio->date_childbirth_foreseen}} </p>
                    <p> Status do Cio: {{$cio->status}} </p>
                </div>
            @endif
            @endif
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
