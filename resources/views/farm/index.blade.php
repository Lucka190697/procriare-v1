<div class="card">
    <div class="card-header">
        Fazendas
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <tbody>
            <tr>
                <td>ID</td>
                <td>Nome Da Fazenda</td>
                <td>Cidade</td>
                <td>UF</td>
                <td>Criação</td>
                <td>Última edição</td>
                <td>Operações</td>
            </tr>
            @foreach ($farms as $farm)
                @include('layouts.modals.destroyFarm')
                <tr>
                    @if($farm->auth_user ==  auth()->user()->id)
                        <th>{{$farm->id}}</th>
                        <th>{{$farm->name}}</th>
                        <th>{{$farm->city}}</th>
                        <th>{{$farm->state}}</th>
                        <th>{{$farm->created_at}}</th>
                        <th>{{$farm->updated_at}}</th>
                        <th class="btn-group text-white">
                            <a class="btn btn-warning" data-toggle="modal"
                               data-target="#destroyFarmModal">
                                <i class="fa fa-power-off"></i>
                                Desvincular
                            </a>
                        </th>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
