<div class="col-md-12">
    <div class="card">
        <div class="card-header" >
            <h4 class="card-title">{{__('Filter')}} </h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse @if(request()->has('status') || request()->has('from_date') || request()->has('to_date')) show @endif">
            <div class="card-body">
                {!! Form::open(['class'=>'form','method'=>'GET']) !!}
                <div class="row">
                    @include('dashboard.'.$include.'.partials._filter_form')                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
