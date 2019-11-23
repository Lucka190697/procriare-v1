<a class="btn btn-group btn-primary" href="{{ route('animals.show', $animal->id) }}">
    <i class="fa fa-eye"></i>
</a>
<a class="btn btn-group btn-success" href="{{ route('animals.edit',  $animal->id) }}">
    <i class="fa fa-edit"></i>
</a>
@if(($animal->sex == 'femeale')&& ($animal->class != 'she-calves'))
    <a class="btn btn-group btn-warning" href="{{ route('cio.create', $animal->id) }}">
        <i class="fa fa-venus-mars"></i>
    </a>
@endif
