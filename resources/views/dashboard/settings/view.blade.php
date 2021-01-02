@extends('dashboard.layouts.app')
@section('title'){!! __('back.Settings') !!}@endsection
@section('breadcrumb')
       <div class="breadcrumb-wrapper col-12 d-print-none">
    <ol class="breadcrumb" style="border-right: 0px !important;">
       <li class="breadcrumb-item"><a href="{{route('system.home')}}">{{__('back.Home')}}</a>
       </li>
       <li class="breadcrumb-item active">{!! __('back.Settings') !!}
       </li>
   </ol>
</div>
@endsection
@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {!! Form::model($model,['method'=>'post','url'=>'system/setting',
                            'class'=>'form']) !!}
                            @csrf()
                            <div class="row">
                                @include('dashboard.settings.partials._form')
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