@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-2 float-left">
                                <h3 class="mb-0">@lang('labels.Users')</h3>
                            </div>
                            <div class="col-lg-7 col-12">
                                <form action="{{ route('user.search') }}" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               name="name" placeholder="@lang('labels.Search users')">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-outline-light">
                                            <span class="fa fa-search"></span>
                                         </button>
                                    </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-2 float-right">
                                @if($title == 'search')
                                    <a href="{{route('admin.user.index')}}" class="btn btn-danger">
                                        <i class="fa fa-arrow-left"></i>@lang('labels.Back')</a>
                                @endif
                                @if($title == 'Users')
                                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                                        <i class="fa fa-plus mr-2"></i>@lang('labels.Add User')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        @include('layouts.flash-message')
                    </div>
                    <!-- Farms table -->
                    @include('farm.index')
                    <div class="card">
                        <div class="card-header">
                            Usuários
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    @include('users.partials.table._head')
                                    <tbody>
                                    @foreach ($users as $user)
                                        @if($user->farm_id ==  auth()->user()->id)
                                            @include('users.partials.table._body')
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            @if($title == 'Users')
                                {{$users->links()}}
                            @endif
                            @if($title == 'search')
                                <a href="{{route('user.index')}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-arrow-left"></i>@lang('labels.Back')
                                </a>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
