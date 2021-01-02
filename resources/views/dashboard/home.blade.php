@extends('dashboard.layouts.app')
@section('title'){!! __('back.Home') !!}@endsection
@section('header')@endsection
@inject('subject','App\Models\Subject')
@inject('member','App\Models\Member')
@inject('comment','App\Models\Comment')
@inject('rating','App\Models\Rating')


@section('content')
   <!--  <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Search by date</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {!! Form::open(['method'=>'get','class'=>'form']) !!}
                            <div class="row">
                                @if($errors->any())
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                @endif
                                <div class="form-group  col-md-6">
                                    <label for="from_date"> {{__('From date')}}</label>
                                    {!! Form::text('from',request()->from ??null,['class'=>'form-control col datepicker','id'=>'from_date']) !!}
                                </div>

                                <div class="form-group  col-md-6">
                                    <label for="to_date"> {{__('To date')}} </label>
                                    {!! Form::text('to',request()->to??null,['class'=>'form-control col datepicker','id'=>'to_date']) !!}
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn col-12 btn-primary mr-1 mb-1 waves-effect waves-light">{{__('Search')}} <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section> -->
<div class="content-body">
                <!-- Statistics card section start -->
                <section id="statistics-card">
                    <div class="row">

                         <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-user-check text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$member->where('type','doctor')->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.Doctors')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-users text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$member->where('type','member')->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.Patients')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-file text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$subject->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.subjects')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-eye text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{ $member->visits }}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.Views')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-message-square text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$comment->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.Comments')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-award text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$rating->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.Reviews')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                   
                </section>
                <!-- // Statistics Card section end-->

            </div>

@endsection

