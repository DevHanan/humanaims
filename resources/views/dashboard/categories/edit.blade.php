@extends('dashboard.layouts.app')
@section('title'){!! __('back.Edit Component') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'categories'])
@endsection
@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h4 class="card-title">@yield('title')</h4>
                    </div> -->
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {!! Form::model($category,['method'=>'put','route'=>['system.categories.update',$category->id],'class'=>'form']  ) !!}
                            @csrf()
                            <div class="row">
                                @include('dashboard.categories.partials._form')
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
@section('js-validation')
       <script type="text/javascript" src="{{ asset('Category/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\CategoryRequest', '.form'); !!}
@endsection
