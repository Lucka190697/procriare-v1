@csrf
<div class="row">
    <div class="col-lg-5 col-sm-12 text-black">
        <div class="ml-2 form-group">
            <!-- id_animals -->
            <div class="form-group mb-3">
                <label class="form-control-label" for="id">
                    Selecione o animal que apresentou Cio
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('animal_id'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Este campo é necessário!
                    </div>
                @endif
                <select name="animal_id" id="id" class="form-control">
                    <option value="">Selecione</option>
                    <option value="{{ $animals->id }}" selected>
                        [ {{ $animals->id }} ] - {{ $animals->name }}
                    </option>
                </select>
                <small>
                    Qual animal apresentou cio?
                </small>
            </div>

            <!-- dt_cio -->
            <div class="form-group mb-3">
                <label class="form-control-label" for="dt_cio">
                    Data do Cio
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('date_animal_heat'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Não use uma data posterior a hoje!
                    </div>
                @endif
                <input name="date_animal_heat"
                       type="date"
                       id="dt_cio"
                       class="form-control border {{$errors->has('date_animal_heat') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Nome ou apelido do animal" required
                       value="{{old('date_animal_heat')}}"/>
                <small class="form-text">
                    Data em que o animal apresentou Cio
                </small>
            </div>

            <!-- dt_cobertura -->
            <div
                class="form-group mb-3 {{ $errors->has('date_coverage') ? 'text-danger border-danger is-invalid' : '' }}">
                <label class="form-control-label" for="date_coverage">
                    Data de Cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('date_coverage'))
                        <div class="float-lg-right badge badge-danger mb-2">
                            É recomenável que a data da cobertura seja a mesma ou um dia depois do cio!
                        </div>
                    @endif
                </label>
                <input name="date_coverage"
                       type="date"
                       id="date_coverage"
                       class="form-control border {{$errors->has('date_coverage') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Data da Cobertura" required
                       value="{{old('date_coverage')}}">
                <small class="form-text">
                    Data da Cobertura
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-sm-12 text-black">
        <div class="ml-2 form-group">
            <!-- tipo -->
            <div
                class="form-group mb-3 {{$errors->has('childbirth_type') ? 'text-danger border-danger is-invalid' : ''}}">
                <label class="form-control-label" for="tipo">
                    Tipo de cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('childbirth_type'))
                        <div class="float-lg-right badge badge-danger mb-2">
                            Este campo é necessário!
                        </div>
                    @endif
                </label>
                <select
                    class="form-control border {{$errors->has('childbirth_type') ? 'text-danger border-danger is-invalid' : ''}}"
                    id="tipo" name="childbirth_type">
                    <option value="">Selecione</option>
                    <option value="insemination">
                        Inseminaçao Artificial
                    </option>
                    <option value="natural">
                        Monta Natural
                    </option>
                </select>
                <small>
                    De maneira foi a cobertura?
                </small>
            </div>
        </div>
        <!-- father -->
        <div class="form-group mb-3 col-sm-12" id="current-bull">
            <fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">
                <label class="form-control-label" for="touro">
                    Nome do touro
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('father'))
                        <div class="float-lg-right badge badge-danger mb-2">
                            Este campo é necessário!
                        </div>
                    @endif
                </label>
                <select name="father" class="form-control mb-3  border
                        {{$errors->has('father') ? 'text-danger border-danger is-invalid' : ''}}"
                        id="touro" data-value="{{ $errors->has('father') ? ' has-danger' : '' }}">
                    <option value="Desconhecido" selected>
                        Selecione
                    </option>
                    @foreach($flock as $rebanho)
                        @if (($rebanho->sex == 'male') && ($rebanho->class == 'bull-reproductive'))
                            <option value="{{$rebanho->id}}">
                                [ {{ $rebanho->id }} ] - {{ $rebanho->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <!-- Adicionar um touro nao listado -->
                <button class="btn btn-white text-primary col-12" type="button" id="add-input">
                    <i class="fa fa-plus"></i>
                    Adicionar Touro nao listado
                </button>
            </fieldset>
        </div>
        <!-- father_id -->
        <div class="form-group col-sm-12 mb-3" style="display: none;" id="new-bull">
            <fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">
                <label class="form-control-label col-sm-12" for="father_id">
                    Digite o ID do Touro (O Número que fica na palheta do sêmen)
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    <div>
                        <img src="{{asset('/argon/palhetas-semen.jpg')}}" class="col-sm-12" width="350">
                    </div>
                    @if($errors->has('father_id'))
                        <div class="float-lg-right badge badge-danger">
                            Este campo é necessário!
                        </div>
                    @endif
                </label>
                <input type="number" id="father_id" name="father_id" placeholder="exemplo: 212115"
                       class="form-control border {{$errors->has('father_id') ? 'text-danger border-danger is-invalid' : ''}}"
                       value="{{ $errors->has('father_name') ? ' has-danger' : '' }}">
                <small>exemplo: 212115</small>
                <br>
                <label class="form-control-label" for="father_name">
                    Digite o nome do Touro
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('father_name'))
                        <div class="float-lg-right badge badge-danger">
                            Este campo é necessário!
                        </div>
                    @endif
                </label>
                <input type="text" class="form-control border
                        {{$errors->has('father_id') ? 'text-danger border-danger is-invalid' : ''}}"
                       id="father_name" name="father_name" placeholder="Opcional"
                       value="{{ $errors->has('father_id') ? ' has-danger' : '' }}">
                <button
                    class="btn btn-white text-primary mt-3 col-sm-12"
                    style="display: none;" type="button" id="add-select">
                    <i class="fa fa-plus"></i>
                    Touro da propriedade
                </button>
                <!-- -->
            </fieldset>
        </div>
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
