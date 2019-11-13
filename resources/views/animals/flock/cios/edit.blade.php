@extends('layouts.app')

@section('content')
    @include('users.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                Novo Ciclo Reprodutivo
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('cio.index') }}"
                                   class="btn btn btn-primary">
                                    <i class="fa fa-arrow-left mr-2"></i>@lang('labels.Back')
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <label>@lang('labels.fields with')
                            <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                            @lang('labels.are required')
                        </label>
                        <div class="col-12">
                            <form class="form-horizontal"
                                  method="POST"
                                  enctype="multipart/form-data"
                                  name="user-form"
                                  action="{{route('cio.update', $cios->id)}}">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PUT">
                                @include('animals.flock.cios.partials._edit-form')
                                <div class="col-5">
                                    <button class="btn btn-success btn-block" type="submit">
                                        <i class="fa fa-check mr-2"></i>@lang('labels.Create')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection
