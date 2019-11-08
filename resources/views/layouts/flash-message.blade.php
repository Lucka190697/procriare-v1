<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
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
