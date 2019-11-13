<div class="card">
    <div class="card-header">
        Fazendas
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush table-bordered">
            <tbody>
            <tr>
                <td>ID</td>
                <td>Nome Da Fazenda</td>
                <td>Cidade</td>
                <td>UF</td>
                <td>Criação</td>
                <td>Última edição</td>
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
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
