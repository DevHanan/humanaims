<div class="form-group  col-md-6">
    <label for="status"> {{__('Status')}} </label>
    {{ Form::select('status', \App\Models\Estimate::selectStatusList(), request()->status ??null,['class'=>'form-control select2','placeholder'=>__('Select status')]) }}
    {{input_error($errors,'status')}}
</div>
<div class="form-group  col-md-6">
    <label for="status"> {{__('Customer')}} </label>
    {{ Form::select('customer_id',\App\Models\Customer::all()->pluck('name','id'), request()->customer_id ??null,['class'=>'form-control select2','placeholder'=>__('Select customer')]) }}
    {{input_error($errors,'customer_id')}}
</div>

<div class="form-group  col-md-6">
    <label for="from_date"> {{__('From date')}}</label>
    {!! Form::text('from_date',request()->from_date ??null,['id'=>'from_date','class'=>'form-control col datepicker']) !!}
    {{input_error($errors,'from_date')}}
</div>

<div class="form-group  col-md-6">
    <label for="to-date"> {{__('To date')}}</label>
    {!! Form::text('to_date',request()->to_date ??null,['id'=>'to_date','class'=>'form-control col datepicker']) !!}
    {{input_error($errors,'to_date')}}
</div>

@component('dashboard.layouts.partials.buttons._filter_button',['route'=>'system.estimates.index'])
@endcomponent
