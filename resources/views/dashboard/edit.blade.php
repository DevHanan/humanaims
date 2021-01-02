@extends('dashboard.layouts.app')
@section('title'){!! __('Edit profile') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'users'])
@endsection
@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@yield('title')</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {!! Form::model(\Illuminate\Support\Facades\Auth::user(),['method'=>'put','route'=>['system.home.update',\Illuminate\Support\Facades\Auth::id()],'class'=>'form']  ) !!}
                            @csrf()
                            <div class="row">

                                <div class="form-group  col-md-6">
                                    <label for="formInputRole"> {{__('Email')}} </label>
                                    {!! Form::email('email',null,['class'=>'form-control col']) !!}
                                    {{input_error($errors,'email')}}
                                </div>

                                <div class="form-group  col-md-6">
                                    <label for="formInputRole"> {{__('Password')}} </label>
                                    {!! Form::password('password',['class'=>'form-control col']) !!}
                                    {{input_error($errors,'password')}}
                                </div>

                                <div class="form-group  col-md-6">
                                    <label for="formInputRole"> {{__('Confirm Password')}} </label>
                                    {!! Form::password('password_confirmation',['class'=>'form-control col']) !!}
                                    {{input_error($errors,'password_confirmation')}}
                                </div>



                            @component('dashboard.layouts.partials.buttons._save_button',[])
                                @endcomponent
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

