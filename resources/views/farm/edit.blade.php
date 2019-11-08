@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center mb-4">
                            <h3>Edite sua Fazenda</h3>
                            <p>Antes de você se cadastrar, você deve cadastrar sua propriedade.<br>
                                A partir daí, você pode adicionar um funcionário para te auxiliar
                                no gerenciamento dos animais.</p>

                        </div>
                        <form role="form" method="PATCH" action="{{route('admin.farm.update', $farm)}}">
                            @csrf
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user -3"></i></span>
                                    </div>
                                    <input class="text-dark form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="Nome: {{$farm->name}}" type="text"
                                           name="name"
                                           value="{{$farm->name}}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-dark form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-mail-bulk -83"></i>
                                        </span>
                                    </div>
                                    <input class="text-dark form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}"
                                           placeholder="{{$farm->cep}}" type="number" name="cep" id="cep"
                                           value="{{$farm->cep}}" required>
                                </div>
                                @if ($errors->has('cep'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-dark form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-street-view -83"></i></span>
                                    </div>
                                    <input class="text-dark form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                           placeholder="{{$farm->name}}" type="text" name="city" id="cidade"
                                           value="{{$farm->city}}" required>
                                </div>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-dark form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        {{--<label for="uf"> Estado </label>--}}
                                        <span class="input-group-text"><i class="fa fa-flag -83"></i></span>
                                    </div>
                                    <select class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}"
                                            name="state" id="uf" required>
                                        <option selected value="{{$farm->state}}">
                                            {{$farm->state}}
                                        </option>
                                        <option value="AC">AC - Acre</option>
                                        <option value="AL">AL - Alagoas</option>
                                        <option value="AP">AP - Amapá</option>
                                        <option value="AM">AM - Amazonas</option>
                                        <option value="BH">BH - Bahia</option>
                                        <option value="CE">CE - Ceará</option>
                                        <option value="DF">DF - Distrito Federal</option>
                                        <option value="ES">ES - Espírito Santo</option>
                                        <option value="GO">GO - Goiás</option>
                                        <option value="MA">MA - Maranhão</option>
                                        <option value="MT">MT - Mato Grosso</option>
                                        <option value="MS">MS - Mato Grosso do Sul</option>
                                        <option value="MG">MG - Minas Gerais</option>
                                        <option value="PA">PA - Pará</option>
                                        <option value="PB">PB - Paraíba</option>
                                        <option value="PR">PR - Paraná</option>
                                        <option value="PE">PE - Pernambuco</option>
                                        <option value="PI">PI - Piauí</option>
                                        <option value="RJ">RJ - Rio de Janeiro</option>
                                        <option value="RN">RN - Rio Grande do Norte</option>
                                        <option value="RS">RS - Rio Grande do Sul</option>
                                        <option value="RO">RO - Rondônia</option>
                                        <option value="RO">RR - Roraima</option>
                                        <option value="SC">SC - Santa Catarina</option>
                                        <option value="SP">SP - São Paulo</option>
                                        <option value="SE">SE - Sergipe</option>
                                        <option value="TO">TO - Tocantins</option>
                                    </select>
                                </div>
                                @if ($errors->has('state'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister"
                                               type="checkbox"
                                               checked>
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-mute">@lang('labels.I agree with the')<a
                                                        href="#">@lang('labels.Privacy Policy')</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-lg btn-primary mt-4">
                                    Próximo <i class="mr-2 fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
