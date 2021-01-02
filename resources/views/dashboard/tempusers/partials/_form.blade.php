@inject('roles','App\Models\Role')
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
    <label for="formInputRole"> {{__('back.roles')}} </label>
    {{ Form::select('role_id', $roles->all()->pluck('name', 'id')->toArray(), $user->roles ?? null?? null,['class'=>'select2 ',disable_on_show(),'autocomplete'=>"off" , 'placeholder'=>'Please Select']) }}
    {{input_error($errors,'role_id')}}
</div>



