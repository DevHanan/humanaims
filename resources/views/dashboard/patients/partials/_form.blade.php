<div class="form-group  col-md-6">
    <label for="formInputRole"> {{__('Full name')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,'autocomplete'=>"off"]) !!}
    {{input_error($errors,'name')}}
</div>

{{--<div class="form-group  col-md-6">--}}
{{--    <label for="formInputRole"> {{__('Username')}} </label>--}}
{{--    {!! Form::text('username',null,['class'=>'form-control col']) !!}--}}
{{--    {{input_error($errors,'username')}}--}}
{{--</div>--}}

<div class="form-group  col-md-6">
    <label for="formInputRole"> {{__('Email')}} </label>
    {!! Form::email('email',null,['class'=>'form-control col','autocomplete'=>"off"]) !!}
    {{input_error($errors,'email')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputRole"> {{__('Password')}} </label>
    {!! Form::password('password',['class'=>'form-control col','autocomplete'=>"off"]) !!}
    {{input_error($errors,'password')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputRole"> {{__('Confirm Password')}} </label>
    {!! Form::password('password_confirmation',['class'=>'form-control col','autocomplete'=>"off"]) !!}
    {{input_error($errors,'password_confirmation')}}
</div>

{{--<div class="form-group  col-md-6">--}}
{{--    <label for="formInputRole"> {{__('Phone')}} </label>--}}
{{--    {!! Form::text('phone',null,['class'=>'form-control col']) !!}--}}
{{--    {{input_error($errors,'phone')}}--}}
{{--</div>--}}

{{--<div class="form-group  col-md-6">--}}
{{--    <label for="formInputRole"> {{__('Role Name')}} </label>--}}
{{--    {{Form::select('role',\App\Models\Role::pluck('name','name'), isset($user) ? (isset($user->roles)?$user->roles->pluck('name')->toArray(): null) : null,['class'=>'form-control mb-2','id'=>'inlineFormInput','placeholder'=>''])}}--}}
{{--    {{input_error($errors,'role')}}--}}
{{--</div>--}}


