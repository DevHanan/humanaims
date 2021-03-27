@extends('dashboard.layouts.app')
@section('title'){!! __('back.Home') !!}@endsection
@section('header')@endsection
@inject('product','App\Models\Product')
@inject('customer','App\Models\Customer')
@inject('bill','App\Models\Bill')
@inject('user','App\User')
@section('content')
   
<div class="content-body">
                <!-- Statistics card section start -->
                <section id="statistics-card">
@canany(['all_static'])
                    <div class="row">

                         <div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-user-check text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$customer->where('type','commerical')->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.Commerial Customer')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

 <div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-user-check text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$customer->where('type','personal')->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.Personal Customer')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

<div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-user-check text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$user->where('type','distrib')->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.distribuer ')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-user-check text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$user->where('type','sale')->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.sales ')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                         
                    <div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-file text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$product->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.products')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
 <div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-file text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$bill->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.bills')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                     @endcan
@if(auth()->user()->type == 'distrib')


<div class="row">


                        
 <div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-file text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$bill->where('user_id',auth()->user()->id)->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.bills')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
 <div class="col-xl-3 col-md-3 col-sm-6">
 <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="feather icon-user-check text-info font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="text-bold-700">{{$user->where('user_id',auth()->user()->id)->count()}}</h2>
                                        <p class="mb-0 line-ellipsis">{{__('back.Sales ')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        



@endif
                       
                    </div>

                   
                        
                        <div class="row">
                        </div>
                       
                   
                </section>
                <!-- // Statistics Card section end-->

            </div>

@endsection

