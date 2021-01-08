@extends('dashboard.layouts.app')
@section('title'){!! __('back.Home') !!}@endsection
@section('header')@endsection
@inject('subject','App\Models\Subject')
@inject('member','App\Models\Member')
@inject('comment','App\Models\Comment')
@inject('rating','App\Models\Rating')


@section('content')
   
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

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('back.Five Latest Subjects')}} </h4>
                                </div>
                                <div class="card-content">
                                        @if($recent_subject)
                                    <div class="card-body">
                                        @foreach($recent_subject as $subject)
                                          <div class="list-group">
                                            <a href="{{url('system/subjects/'.$subject->id)}}" class="list-group-item list-group-item-action ">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <div class="col-md-6">
                                                          <h5 class="mb-1 text-white">{{optional($subject->member)->fullname}}</h5>
                                                    </div>
                                                  
                                                    <div class="col-sm-6" style="text-align:end;">
                                                        <p >  
                                                        <small>{{$subject->readableDate}}</small>
                                                        </p>
                                                        <small > {{__('back.Views')}} <span>{{$subject->viewCount}}</span></small> 
                                                    </div>
                                                    
                                                    
                          

                                                </div>
                                                <p class="mb-1"> {{ substr($subject->body,0,20)}}</p>
                                            </a>
                                           
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                    {{__('back.No Data Found')}} 
                                    @endif
                                </div>
                            </div>
                        </div>
                          <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('back.Most Visited Subjects')}} </h4>
                                </div>
                                <div class="card-content">
                                    @if($most_visited)
                                    <div class="card-body">
                                        @foreach($most_visited as $subject)
                                        <div class="list-group">
                                            <a href="{{url('system/subjects/'.$subject->id)}}" class="list-group-item list-group-item-action ">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <div class="col-md-6">
                                                          <h5 class="mb-1 text-white">{{optional($subject->member)->fullname}}</h5>
                                                    </div>
                                                  
                                                    <div class="col-sm-6" style="text-align:end;">
                                                        <p >  
                                                        <small>{{$subject->readableDate}}</small>
                                                        </p>
                                                        <small > {{__('back.Views')}} <span>{{$subject->viewCount}}</span></small> 
                                                    </div>
                                                    
                                                    
                          

                                                </div>
                                                <p class="mb-1"> {{ substr($subject->body,0,20)}}</p>
                                            </a>
                                           
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                     {{__('back.No Data Found')}} 
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                        </div>
                       
                   
                </section>
                <!-- // Statistics Card section end-->

            </div>

@endsection

