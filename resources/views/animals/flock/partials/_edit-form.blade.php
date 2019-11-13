@csrf
<div class="row">
    <div class="col-lg-5 col-12 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3">
                <!-- ID -->
                <label class="form-control-label" for="id"> Código do Animal </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('code'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo ID é Necessário! Insira um número válido
                    </div>
                @endif
                <input name="code"
                       type="number"
                       id="id"
                       class="form-control form-control-alternative
                       {{$errors->has('code') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Número de Identificação, número do brinco"
                       value="{{old('code') ?? $animals->code ?? '' }}" required/>
                <small class="form-text"> Número do Brinco do animal. Não pode ficar em branco!</small>
            </div>
            <div class="form-group mb-3">
                <!-- Nome -->
                <label class="form-control-label" for="nome"> Nome </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('name'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira um nome válido, exemplo: Mimosa, com no mínimo 5 caracteres
                    </div>
                @endif
                <input name="name"
                       type="text"
                       id="nome"
                       class="form-control border {{$errors->has('name') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('name') ?? $animals->name ?? '' }}" required/>
                <small class="form-text"> Nome do animal, apelido</small>
            </div>
            <div class="form-group mb-3">
                <!-- Data de Nascimento -->
                <label class="form-control-label" for="DTNasc">
                    Data de Nascimento
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('born_date'))
                        <div class="float-lg-right badge badge-danger mb-2">
                            Insira uma data entre 01/01/2010 e hoje.
                        </div>
                    @endif
                </label>
                <input name="born_date"
                       type="date"
                       id="dt_nascimento"
                       class="form-control border {{$errors->has('born_date') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Data de nascimento do animal"
                       value="{{old('born_date', $animals->born_date) }}" required/>
                <small class="form-text"> Dia, mês e ano que o animal nasceu</small>
            </div>
            <div class="form-group mb-3">
                <!-- Data de Nascimento -->
                <label class="form-control-label" for="sexo"> Sexo </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('sex'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Selecione este campo com "Macho" ou "Fêmea"
                    </div>
                @endif
                <select
                    class="form-control border {{$errors->has('sex') ? 'text-danger border-danger is-invalid' : ''}}"
                    id="sexo" name="sex" required>
                    <option value="{{old('sex') ?? $animals->sex ?? '' }}" selected>
                        {{$animals->sex == 'femeale' ? 'Femea' : 'Macho'}}
                    </option>
                    @if($animals->sex == 'femeale')
                        <option value="male">Macho</option>
                    @elseif($animals->sex == 'femeale')
                        <option value="male">Macho</option>
                    @endif
                </select>
            </div>
            <div class="form-group mb-3">
                <!-- Raça -->
                <label class="form-control-label" for="raca">
                    Raça
                </label>
                @if($errors->has('breed'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Selecione uma Raça!
                    </div>
                @endif
                <select
                    class="form-control border {{$errors->has('breed') ? 'text-danger border-danger is-invalid' : ''}}"
                    id="raca" name="breed">
                    <option value="{{old('breed') ?? $animals->breed ?? '' }}" selected>
                        {{old('breed') ?? $animals->breed ?? '' }}
                    </option>
                    <option value=" - ">Selecione</option>
                    <option value="Jersey">Jersey</option>
                    <option value="Nelore">Nelore</option>
                    <option value="Zebu">Zebu</option>
                    <option value="Guzera">Guzera</option>
                    <option value="Sindi">Sindi</option>
                    <option value="Pardo Suiço">Pardo Suiço</option>
                    <option value="Holandesa">Holandesa</option>
                    <option value="Gir Leiteiro">Gir Leiteiro</option>
                    <option value="Girolando">Girolando</option>
                    <option value="Mestiça">Mestiça</option>
                    <option value="Outra">Outra</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-lg-5 col-12 text-black">
        <div class="form-group mb-3">
            <label class="form-control-label" for="classificacao">
                Classificação
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('class'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Classificação é Necessário!
                    </div>
                @endif
            </label>
            <select
                class="form-control border {{$errors->has('class') ? 'text-danger border-danger is-invalid' : ''}}"
                id="classificacao" name="class" required>
                <option value="">Selecione</option>
                <option value="{{old('class') ?? $animals->class ?? '' }}" selected>
                    @lang("labels.$animals->class")
                </option>
                <option value="heifer">
                    Novilha (Fêmea que já atingiu a maturidade sexual mas ainda não criou)
                </option>
                <option value="cow-lactating">
                    Vaca Lactante (Fêmea sexualmente ativa e que está produzindo leite)
                </option>
                <option value="cow-non-lactating">
                    Vaca Não Lactante (Fêmea sexualmente ativa mas que não está produzindo leite)
                </option>
                <option value="cow-dry">
                    Vaca Seca (Fêmea sexualmente ativa que não está lactando por quanto)
                </option>
                <option value="she-calves">
                    Bezerra (Fêmea recém nascida até o desmame)
                </option>
                <option value="bull-reproductive">
                    Touro (Macho sexualmente ativo)
                </option>
                <option value="bull-castrated">
                    Capão (Macho castrado)
                </option>
                <option value="bull-ruffian">
                    Bezerro (Macho recém nascido até o desmame)
                </option>
            </select>
            <small class="form-text">exemplo: novilha</small>
        </div>
        <div class="form-group">
            <div class="form-group mb-3">
                <label class="form-control-label" for="confirm_password">
                    Imagem do animal
                </label>
                @if($errors->has('thumbnail'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira uma imagem válida!
                    </div>
                @endif
                <input name="thumbnail"
                       type="file"
                       id="profile"
                       class="form-control border {{$errors->has('thumbnail') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="file"
                       value="{{old('thumbnail') ?? $animals->thumbnail ?? '' }}"/>
                <small class="form-text"> Por favor, escolha uma imagem no formato jpg, jpeg, gif ou png</small>
            </div>
        </div>
        <!-- filiação -->
        <div class="form-group mb-3">
            <label class="form-control-label" for="pai">
                Filiação Paterna, (Pai)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('father'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Pai é Necessário!
                    </div>
                @endif
            </label>
            <select
                name="father" id="pai"
                class="form-control border{{$errors->has('father') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="{{old('father') ?? $animals->class ?? '' }}" selected>
                    @if($animals->father == 'unknow')
                        @lang("labels.$animals->father")
                    @else
                        {{old('father') ?? $animals->father ?? '' }}
                    @endif
                </option>
                <option value="unknow">Touro Desconhecido</option>
                @if (($animals->sex == 'male') && (($animals->class == 'bull-reproductive')))
                    <option value="{{ $animals->id }}">[ {{ $animals->id }} ] {{ $animals->name }} </option>
                @endif
            </select>
            <small class="text-warning">
                É preciso que o Touro pai esteja cadastrado.<br>
                Se não, cadastre este primeiro como pai desconhecido!
            </small>
        </div>

        <div class="form-group mb-3">
            <label class="form-control-label" for="mae">
                Filiação Materna, (Mãe)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('mother'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Mãe é Necessário!
                    </div>
                @endif
            </label>
            <select
                name="mother" id="mae"
                class="form-control border {{$errors->has('mother') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="{{old('mother') ?? $animals->mother ?? '' }}" selected>
                    @if($animals->mother == 'unknow')
                        @lang("labels.$animals->mother")
                    @else
                        {{old('mother') ?? $animals->mother ?? '' }}
                    @endif
                </option>
                <option value="unknow"> Mae Desconhecida</option>
                @if($animals->id == $animals->farm_id)
                    @if (($animals->sexo == 'femeale') && (($animals->class == 'cow-lactating'))
                     || ($animals->class == 'cow-non-lactating') || ($animals->class = 'heifer'))
                        <option value="{{ $animals->id }}">
                            [ {{ $animals->id }} ] - {{ $animals->name }}, @lang("labels.$animals->class")
                        </option>
                    @endif
                @endif
            </select>
            <small class="text-warning">
                Se a mãe não estiver cadastrada cadastre-a primeiro<br>
                Se não mantenha "Desconhecida"
            </small>
        </div>
        <!-- /filiacao -->

        <div class="form-group mb-3">
            <label class="form-control-label" for="status">
                Status
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('status'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Status é Necessário!
                    </div>
                @endif
            </label>
            <select
                name="status" id="status"
                class="form-control {{$errors->has('status') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="{{old('status') ?? $animals->status ?? '' }}" selected>
                    @lang("labels.$animals->status")
                </option>
                <option value="alive">Vivo</option>
                <option value="dead">Morto</option>
                <option value="sold">Vendido</option>
            </select>
            <small class="text-warning">
                O status determina o estado atual do animal <br>
                Se Você vendeu ele ou ele morreu, altere este campo.
            </small>
        </div>
    </div>
</div>
