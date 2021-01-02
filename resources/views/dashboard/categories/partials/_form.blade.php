

<div class="form-group  col-md-12">
    <label for="formInputArabicName"> {{__('back.Arabic Name')}}</label>
    {!! Form::text('name_ar',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'name_ar')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputEnglishName"> {{__('back.English Name')}}</label>
    {!! Form::text('name_en',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'name_en')}}
</div>









