<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/11223.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="<?php echo asset('profiles/' . auth()->user()->name) ?>">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">@lang('labels.Welcome!')</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>@lang('labels.My') @lang('labels.profile')</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>@lang('labels.Activity')</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>@lang('labels.Support')</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>@lang('labels.LogOut')</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                           placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2"></i>
                        @lang('labels.Home')
                    </a>
                </li>
                <!-- item do rebanho -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-flock" data-toggle="collapse" role="button"
                       aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fa fa-paste"></i>
                        <span class="nav-link-text">@lang('labels.Flock')</span>
                    </a>
                    <div class="collapse show" id="navbar-flock">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('animals.index') }}">
                                    <i class="fa fa-list-ul"></i>@lang('labels.Total')
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- item dos usuario -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-users" data-toggle="collapse" role="button"
                       aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fa fa-users-cog"></i>
                        <span class="nav-link-text">R.H</span>
                    </a>

                    <div class="collapse show" id="navbar-users">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    <i class="fa fa-user"></i> @lang('labels.User') @lang('labels.profile')
                                </a>
                            </li>
                            @if(auth()->user()->hasRole(\App\Enums\UserRolesEnum::ADMIN))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                                        <i class="fa fa-user-tie"></i> {{ __('User Management') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cio.index') }}" class="nav-link">
                        <i class="fa fa-venus-mars mr-2"></i>@lang('labels.Cios')</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('animals.report')}}" class="nav-link">
                        <i class="fa fa-calendar mr-2"></i>Gerar Relatório</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
