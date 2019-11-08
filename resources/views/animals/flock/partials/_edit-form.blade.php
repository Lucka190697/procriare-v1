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
                       value="{{old('code') ?? $item->code ?? '' }}" required/>
                <small class="form-text"> Número do Brinco do animal. Não pode ficar em branco!</small>
            </div>
            <div class="form-group mb-3">
                <!-- Nome -->
                <label class="form-control-label" for="nome"> Nome </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('name'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira um nome válido, exemplo: Mimosa
                    </div>
                @endif
                <input name="name"
                       type="text"
                       id="nome"
                       class="form-control border {{$errors->has('name') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('name') ?? $item->name ?? '' }}" required/>
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
                       value="{{old('born_date') ?? $item->born_date ?? '' }}" required/>
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
                    data-value="{{old('sex') ?? $item->sex ?? 'O campo Tipo está em branco!' }}"
                    id="sexo" name="sex" required>
                    <option value="" selected>Selecione</option>
                    <option value="femeale" name="Fêmea"> Femea</option>
                    <option value="male" name="Macho"> Macho</option>
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
                    id="raca" name="breed" data-value="{{old('breed') ?? $item->breed ?? '' }}">
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
                id="classificacao" name="class" required
                data-value="{{old('class') ?? $item->class ?? '' }}">
                <option value="" selected>Selecione</option>
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
                       value="{{old('thumbnail') ?? $item->thumbnail ?? '' }}"/>
                <small class="form-text"> Por favor, escolha uma imagem no formato jpg, jpeg, gif ou png</small>
            </div>
        </div>
        <!-- filiação -->
        @include('animals.flock.partials.filiacao')
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
                <option value="">Selecione</option>
                <option value="alive" selected>Vivo</option>
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
