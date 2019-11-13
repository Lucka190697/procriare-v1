<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">
            @lang('labels.Painel')
        </a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('animals.index') }}" class="nav-link">--}}
{{--                    <i class="fa fa-crosshairs mr-2"></i>--}}
{{--                    @lang('labels.Total Flock')--}}
{{--                    <span class="badge badge-primary ml-1"> 34 </span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a href="{{route('animals.report')}}" class="nav-link">
                    <i class="fa fa-calendar mr-2"></i>Gerar Relatório</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cio.index') }}" class="nav-link">
                    <i class="fa fa-venus-mars mr-2"></i>@lang('labels.Cios')</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="<?php echo asset('storage/profiles/' . auth()->user()->name) ?>">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold"> @lang('labels.Hello')! {{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">@lang('labels.Wellcome')!</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>@lang('labels.My') @lang('labels.profile')</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>@lang('labels.Suport')</span>
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
    </div>
</nav>
