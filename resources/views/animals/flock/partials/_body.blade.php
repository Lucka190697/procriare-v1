<td>
    <img src="{{asset('animals/' . $animal->thumbnail) }}"
         alt="image"
         width="50"
         height="50"
         class="rounded">
</td>
<td> {{ $animal->id }}</td>
<td> {{$animal->name }} </td>
<td> {{$animal->born_date = date('d/m/Y', strtotime($animal->born_date))}} </td>
<td>@if ($animal->sex == 'femeale')
        <i class="fa fa-venus text-red"></i>
        <span>F</span>
    @else <i class="fa fa-mars text-blue"></i>
        <span>M</span>
    @endif
</td>
<td>@lang("labels.$animal->class")</td>
@if($animal->status == 'ativo')
    <td class="text-success text-uppercase">
        {{ $animal->status }} </td>
@elseif($animal->status == 'morto')
    <td class="text-danger text-uppercase">
        {{ $animal->status }} </td>
@elseif($animal->status == 'vendido')
    <td class="text-warning text-uppercase">
        {{ $animal->status }} </td>
@endif
<td class="btn-group">@include('animals.flock.partials._actionButton')</td>
