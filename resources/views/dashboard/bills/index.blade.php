@extends('dashboard.layouts.app')
@section('title'){!! __('BILLS') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'bills'])
@endsection
    @if(auth()->user()->type == 'distrib')
@section('btn')
        @include('dashboard.layouts.partials._add_icon',['route'=>'bills'])
@endsection
@endif
@section('content')
    <section id="column-selectors">
        <div class="row">

             @include('dashboard.layouts.partials._filter',['include'=>'bills'])

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@yield('title')</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                @include('dashboard.bills.partials._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

