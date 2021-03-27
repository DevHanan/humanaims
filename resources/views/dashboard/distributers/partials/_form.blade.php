@inject('region','App\Models\Region')
<div class="form-group  col-md-6">
    <label for="formInputRole"> {{__('back.Full name')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,'autocomplete'=>"off"]) !!}
    {{input_error($errors,'name')}}
</div>


<div class="form-group  col-md-6">
    <label for="formInputRole"> {{__('back.Email')}} </label>
    {!! Form::email('email',null,['class'=>'form-control col','autocomplete'=>"off"]) !!}
    {{input_error($errors,'email')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputRole"> {{__('back.Password')}} </label>
    {!! Form::password('password',['class'=>'form-control col','autocomplete'=>"off"]) !!}
    {{input_error($errors,'password')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputRole"> {{__('back.Confirm Password')}} </label>
    {!! Form::password('password_confirmation',['class'=>'form-control col','autocomplete'=>"off"]) !!}
    {{input_error($errors,'password_confirmation')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputPermissions"> {{__('back.Regions')}} </label>
    {{ Form::select('regions[]', $region->all()->pluck('name', 'id')->toArray(), null,['class'=>'select2 ',disable_on_show(),'autocomplete'=>"off"  , 'multiple'=> 'multiple']) }}
    {{input_error($errors,'regions')}}
</div>


