@extends('dashboard.layouts.app')
@section('title'){!! __('Patients') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'patients'])
@endsection

@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                @include('dashboard.patients.partials._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

