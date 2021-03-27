
@inject('region','App\Models\Region')

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

<div class="form-group  col-md-12">
    <label for="formInputRegion"> {{__('back.Main Region')}} </label>
    {{ Form::select('parent_id', $region->all()->pluck('name', 'id')->toArray(), $region->parent_id?? $region->parent_id?? null,['class'=>'select2 ',disable_on_show(),'autocomplete'=>"off" , 'placeholder'=>'Please Select']) }}
    {{input_error($errors,'parent_id')}}
</div>







