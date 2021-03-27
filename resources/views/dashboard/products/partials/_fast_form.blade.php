



<div class="form-group  col-md-12">
    <label for="formInputNameAr"> {{__('Arabic Name')}}</label>
    {!! Form::text('name_ar',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'name_ar')}}
</div>




<div class="form-group  col-md-12">
    <label for="formInputNameEn"> {{__('English Name')}}</label>
    {!! Form::text('name_en',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'name_en')}}
</div>

<div class="form-group  col-md-12">
    <label for="formInputLPrice"> {{__('Price')}}</label>
    {!! Form::number('price',@$product->price ? :0.00,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'price')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputdescriptionAr"> {{__('Arabic description')}}</label>
    {!! Form::textarea('description_ar',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'description_ar')}}
</div>



<div class="form-group  col-md-12">
    <label for="formInputdescriptionEn"> {{__('English description')}}</label>
    {!! Form::textarea('description_en',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'description_en')}}
</div>






