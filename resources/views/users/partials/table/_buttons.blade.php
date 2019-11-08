@if ($user->id != auth()->id())
    <form action="{{ route('admin.user.destroy', $user) }}" method="GET">
        @csrf
        <div class="btn-group">
            {{--        @method('delete')--}}
            <a class="btn btn-success" href="{{ route('admin.user.edit', $user) }}">
                <i class="fa fa-pen"></i> @lang('labels.Edit')
            </a>
            <button class="btn btn-danger text-white" type="submit"
                    onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                <i class="fa fa-trash"></i>
                Remover
            </button>
        </div>
    </form>
@else
    <a class="btn  btn-success"
       href="{{ route('profile.edit') }}">
        <i class="fa fa-pen"></i>
        Editar
    </a>
@endif