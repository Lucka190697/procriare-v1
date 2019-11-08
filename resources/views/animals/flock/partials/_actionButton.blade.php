<a class="btn btn-group btn-primary" href="{{ route('animals.show', $animal->id) }}">
    <i class="fa fa-eye"></i>
</a>
<a class="btn btn-group btn-success" href="{{ route('animals.edit',  $animal->id) }}">
    <i class="fa fa-edit"></i>
</a>
{{--<button type="button" class="btn btn-danger" href="{{ route('animals.destroy',  $animal->id) }}">--}}
{{--    <i class="fa fa-eraser"></i>--}}
{{--</button>--}}
@if($animal->sex == 'femeale')
    <a class="btn btn-group btn-warning" href="{{ route('cio.create', $animal->id) }}">
        <i class="fa fa-venus-mars"></i>
    </a>
@endif
