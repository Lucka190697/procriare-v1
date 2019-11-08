<div class="modal fade" id="destroyFarmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h3 class="modal-title text-white">Excluir Fazenda</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="text-center">
                    <i class="fa fa-exclamation-triangle"></i>
                    ATENÇÃO!
                </h1>
                <h3 class="text-danger text-center mb-3">Você está prestes á excluir a sua fazenda!</h3>
                <p class="text-justify">Se excluir a fazenda, todos os seus dados e de seu rebanho será perdido!!
                    Você vai perder TODOS os registros de seu rebanho e seus funcionários não poderão
                    ter acesso ao sistema!
                </p>
                <h2>Você Tem certeza que quer continuar?</h2>

                <h3 class="mt-2" for="yes">Estou ciente, quero prosseguir
                    <input type="checkbox" id="yes customCheckRegister" required>
                </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Não! Tire-me daqui
                </button>
                <a href="{{route('admin.farm.destroy', $farm)}}" class="btn btn-secondary">Sim, por minha conta e
                    risco</a>
            </div>
        </div>
    </div>
</div>