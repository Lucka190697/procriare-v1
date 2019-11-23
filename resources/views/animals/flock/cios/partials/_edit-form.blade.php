@csrf
<div class="row">
    <div class="col-5 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3 {{ $errors->has('id') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="id">
                    Selecione o animal que apresentou Cio
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <select name="animal_id" id="id" class="form-control">
                    @foreach($animals as $animal)
                    @endforeach
                    <option value="{{ $cios->id }}" selected>
                        [ {{ $cios->id }} ] - {{ $animal->name }}
                    </option>
                </select>
                <small>
                    Qual animal apresentou cio?
                </small>
            </div>
            <div class="form-group mb-3{{ $errors->has('date_animal_heat') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="dt_cio">
                    Data do Cio
                </label>
                <input name="date_animal_heat"
                       type="text"
                       id="dt_cio"
                       class="form-control {{ $errors->has('date_animal_heat') ? ' is-invalid' : '' }}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('date_animal_heat') ?? $cios->date_animal_heat ?? '' }}"/>
                <small class="form-text">
                    Data em que o animal apresentou Cio
                </small>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="dt_cobertura">
                    Data de Cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <input name="date_coverage"
                       type="text"
                       id="dt_cobertura"
                       class="form-control {{ $errors->has('date_coverage') ? ' is-invalid' : '' }}"
                       placeholder="Data da Cobertura"
                       value="{{old('date_coverage') ?? $cios->date_coverage ?? '' }}" required/>
                <small class="form-text">
                    Data da Cobertura
                </small>
            </div>
        </div>
    </div>
    <div class="col-5 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3">
                <label class="form-control-label" for="childbirth_type">
                    Data de cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <select class="form-control" id="childbirth_type" name="childbirth_type" required>
                    <option value="{{old('childbirth_type') ?? $cios->childbirth_type ?? '' }}" selected>
                        @if($cios->childbirth_type == 'natural')
                            Monta Natural
                        @elseif($cios->childbirth_type == 'insemination')
                            Inseminação Artificial
                        @endif
                    </option>
                    @if($cios->childbirth_type == 'insemination')
                        <option value="natural">Monta Natural</option>
                    @elseif($cios->childbirth_type == 'natural')
                        <option value="insemination">Inseminação Artificial</option>
                    @endif
                </select>
                <small>
                    De maneira foi a cobertura?
                </small>
            </div>
        </div>

        <div class="form-group mb-3 {{$errors->has('status') ? 'text-danger border-danger is-invalid' : ''}}">
            <label class="form-control-label" for="status">
                Status
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('status'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Este campo é necessário!
                    </div>
                @endif
            </label>
            <br>
            <small class="text-success">Sucesso</small>
            <small>A gestação foi um sucesso, a seguir registrar o bezerro</small><br>
            <small class="text-warning">Pendente</small>
            <small>A gestação ainda está acontecendo</small><br>
            <small class="text-danger">Aborto</small>
            <small>O animal abortou</small>
            <select
                class="form-control border {{$errors->has('status') ? 'text-danger border-danger is-invalid' : ''}}"
                id="status" name="status" required>
                <option value="">Selecione</option>
                <option value="pending" selected>Pendente</option>
                <option value="abortion">Aborto</option>
                @if($cios->date_childbirth_foreseen < today())
                    <option value="success">Sucesso</option>
                @endif
            </select>
            <small>
                De maneira foi a cobertura?
            </small>
        </div>

        <div class="form-group mb-3" id="current-bull">
            <fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">
                <label class="form-control-label" for="touro">
                    Nome do touro
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <select name="father" class="form-control mb-3" id="touro">
                    <option value="Desconhecido">
                        Desconhecido
                    </option>
                    <option value="{{$cios->father}}">
                        {{ $cios->father }}
                    </option>
                    @if(isset($animals->father))
                        <option value="{{$animals->father}}">
                            {{$animals->father}}
                        </option>
                    @endif
                </select>
                <button class="btn btn-white text-primary" type="button" id="add-input">
                    <i class="fa fa-plus"></i>
                    Adicionar um Touro nao listado
                </button>
            </fieldset>
        </div>

        <div class="form-group mb-3" style="display: none;" id="new-bull">
            <fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">
                <label class="form-control-label" for="father">
                    O Nome do Touro fica na palheta do sêmen
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup><br>
                    <div>
                        <img src="{{asset('/argon/palhetas-semen.jpg')}}" width="350">
                    </div>
                </label>
                <br>
                <label class="form-control-label" for="father">
                    Digite o nome do Touro
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <input type="text" class="form-control" id="father" name="father"
                       value="{{old('father') ?? $cios->father ?? '' }}">
                <button
                    class="btn btn-white text-primary mt-3"
                    style="display: none;" type="button" id="add-select">
                    <i class="fa fa-plus"></i>
                    Adicionar um Touro da propriedade
                </button>
                <!-- -->
            </fieldset>
        </div>

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
