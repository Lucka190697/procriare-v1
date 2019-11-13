@if ($user->id != auth()->id())
    <form action="{{ route('admin.user.destroy', $user) }}" method="GET">
        @csrf
        <div class="btn-group">
            {{--        @method('delete')--}}
            <a class="btn btn-success" href="{{ route('admin.user.edit', $user) }}">
                <i class="fa fa-pen"></i>
            </a>
            <button class="btn btn-danger text-white" type="submit"
                    onclick="confirm('{{ __("Tem certeza que quer excluir esse usuário?") }}') ? this.parentElement.submit() : ''">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </form>
@else
    <a class="btn  btn-success"
       href="{{ route('profile.edit') }}">
        <i class="fa fa-pen"></i>
    </a>
@endif
