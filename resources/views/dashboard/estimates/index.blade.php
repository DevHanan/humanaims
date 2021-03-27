@extends('dashboard.layouts.app')
@section('title'){!! __('Estimates') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'estimates'])
@endsection
@section('btn')
        @include('dashboard.layouts.partials._add_icon',['route'=>'estimates'])
@endsection
@section('content')
    <section id="column-selectors">
        <div class="row">

             @include('dashboard.layouts.partials._filter',['include'=>'estimates'])

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@yield('title')</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                @include('dashboard.estimates.partials._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

