@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    {{--<div class="card">--}}
                    <div class="col-md-12 col-lg-12 float-left">
                        @include('event.cio-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-150">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <h1></h1>
            </div>
        </div>
    </div>
    {{--</div>--}}
    @include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
