
@inject('regions','App\Models\Region')

<div class="col-md-12">
    <h2>{{__('Contact')}}</h2>
</div>
<div class="form-group  col-md-12">
    <label for="fname"> {{__('Customer First Name')}}</label>
    {!! Form::text('fname',null,['id'=>'name','class'=>'form-control col','placeholder'=>__(""),'autocomplete'=>"off",disable_on_show()]) !!}
    {{input_error($errors,'fname')}}
</div>

<div class="form-group  col-md-12">
    <label for="lname"> {{__('Customer Last Name')}}</label>
    {!! Form::text('lname',null,['id'=>'name','class'=>'form-control col','placeholder'=>__(""),'autocomplete'=>"off",disable_on_show()]) !!}
    {{input_error($errors,'lname')}}
</div>

<div class="form-group  col-md-6">
    <label for="email"> {{__('Email')}} </label>
    {!! Form::email('email',null,['id'=>'email','class'=>'form-control col',disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'email')}}
</div>

<div class="form-group  col-md-6">
    <label for="phone"> {{__('Phone')}}</label>
    {!! Form::text('phone',null,['id'=>'phone','class'=>'form-control col','placeholder'=>__(""),disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'phone')}}
</div>

<div class="form-group  col-md-6">
    <label for="region_id"> {{__('Region')}} </label>
    {{ Form::select('region_id', $regions->all()->pluck('name', 'id')->toArray(), null,['class'=>'select2 form-control col' ,'placeholder'=>'--------' , 'id'=>'region_id',disable_on_show(),'autocomplete'=>"off"]) }}
    {{input_error($errors,'region_id')}}
</div>












