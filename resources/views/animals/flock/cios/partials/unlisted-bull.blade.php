@csrf
<div class="row">
    <div class="col-5 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3 {{ $errors->has('id') ? ' has-danger' : 'Este ID já existe!' }}">
                <label class="form-control-label" for="id">
                    Selecione o animal que apresentou Cio
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <select name="id_animals" id="id" class="form-control">
                    <option value="">Selecione</option>
                    @foreach ($animals as $item)
                        @if (($item->sexo == 'Fêmea') && (($item->classificacao == 'seca') || ($item->classificacao == 'lactante')))
                            <option value="{{ $item->id }}" selected>
                                [ {{ $item->id }} ] - {{ $item->nome }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <small>
                    Qual animal apresentou cio?
                </small>
            </div>
            <div class="form-group mb-3{{ $errors->has('nome') ? ' has-danger' : 'Nome Inválido!' }}">
                <label class="form-control-label" for="dt_cio">
                    Data do Cio
                </label>
                <input name="dt_cio"
                       type="date"
                       id="dt_cio"
                       class="form-control {{ $errors->has('dt_cio') ? ' is-invalid' : '' }}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('dt_cio') ?? $item->dt_cio ?? '' }}"/>
                <small class="form-text">
                    Data em que o animal apresentou Cio
                </small>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="dt_cobertura">
                    Data de Cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <input name="dt_cobertura"
                       type="date"
                       id="dt_cobertura"
                       class="form-control {{ $errors->has('dt_cobertura') ? ' is-invalid' : '' }}"
                       placeholder="Data da Cobertura"
                       value="{{old('dt_nascimento') ?? $item->dt_cobertura ?? '' }}" required/>
                <small class="form-text">
                    Data da Cobertura
                </small>
            </div>
        </div>
    </div>
    <div class="col-5 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3">
                <label class="form-control-label" for="tipo">
                    Tipo de cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <select class="form-control" id="tipo" name="tipo"
                        data-value="{{old('tipo') ?? $item->tipo ?? '' }}" required>
                    <option value="">Selecione</option>
                    <option value="Inseminaçao" name="Inseminaçao">
                        Inseminaçao Artificial
                    </option>
                    <option value="Natural" name="Natural">
                        Monta Natural
                    </option>
                </select>
                <small>
                    De maneira foi a cobertura?
                </small>
            </div>
        </div>

        <div class="form-group mb-3" id="current-bull">
            <fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">
                <label class="form-control-label" for="touro">
                    Nome do touro
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <select name="father" class="form-control mb-3" id="touro">
                    <option value="Desconhecido" selected>
                        Selecione
                    </option>
                    @foreach($animals as $animal)
                        @if ($animal->sexo == 'Macho')
                            <option value="{{$animal->id}}">
                                [ {{ $animal->id }} ] - {{ $animal->nome }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <button class="btn btn-white text-primary" type="button" id="add-input">
                    <i class="fa fa-plus"></i> Adicionar um Touro nao listado
                </button>
            </fieldset>
        </div>
        {{--<div class="form-group mb-3" style="display: none;" id="new-bull">--}}
        {{--<fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">--}}
        {{--<legend> Touro</legend>--}}
        {{--<!-- -->--}}
        {{--<label class="form-control-label" for="father">--}}
        {{--Digite o ID do Touro (O Número que fica na palheta do sêmen)--}}
        {{--<sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>--}}
        {{--</label>--}}
        {{--<input type="number" class="form-control" id="father" name="father" placeholder="exemplo: 212115">--}}
        {{--<small>exemplo: 212115</small>--}}
        {{--<br>--}}
        {{--<label class="form-control-label" for="father">--}}
        {{--Digite o nome do Touro<br>--}}
        {{--<sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>--}}
        {{--</label>--}}
        {{--<input type="text" class="form-control" id="father" name="father" placeholder="Opcional">--}}
        {{--<button--}}
        {{--class="btn btn-white text-primary mt-3"--}}
        {{--style="display: none;" type="button" id="add-select">--}}
        {{--<i class="fa fa-plus"></i> Adicionar um Touro da propriedade--}}
        {{--</button>--}}
        {{--<!-- -->--}}
        {{--</fieldset>--}}
        {{--</div>--}}

    </div>
</div>

<!--/filiação -->
<script>
    $("#add-input").click(function () {
        $("#new-bull").show();
        $("#current-bull").hide();
        $("#add-select").show();
        // alert('okey');
    });
    $("#add-select").click(function () {
        $("#new-bull").hide();
        $("#current-bull").show();
    });
</script>