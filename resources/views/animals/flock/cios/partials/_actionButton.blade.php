<div class="dropdown-menu" aria-label="dropdownMenuButton">
    <a class="dropdown-item text-primary" href="{{route('cio.show', $cio->id)}}">
        <i class="fa fa-list"></i> Ver Detalhes
    </a>
    <a class="dropdown-item text-success" href="{{route('cio.edit', $cio->id)}}">
        <i class="fa fa-edit text-success"></i> Editar
    </a>
    <a class="dropdown-item text-danger" href="{{route('cio.destroy', $cio->id )}}">
        <i class="fa fa-eraser text-danger"></i> Deletar
    </a>
</div>
