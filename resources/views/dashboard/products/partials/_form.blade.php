

@inject('category','App\Models\Category')

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
    <label for="formInputRegion"> {{__('back. Category')}} </label>
    {{ Form::select('category_id', $category->all()->pluck('name', 'id')->toArray(), $product->category_id?? $product->category_id?? null,['class'=>'select2 ',disable_on_show(),'autocomplete'=>"off" , 'placeholder'=>'Please Select']) }}
    {{input_error($errors,'category_id')}}
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

 <div class="form-group  col-md-12"> 
        <label for="formInputphoto"> {{__('Cover photo')}}</label>

    <div class="custom-file">
    <input type="file" id="inputGroupFile01" name="image" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01"> {{__('back.Choose file')}}</label>
                                  {{input_error($errors,'image')}}

  </div>
<img id="blah" align='middle' src=" @if(isset($page->image)) {{asset($page->image)}} @else http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png @endif" alt="your image" title='' style="max-height: 200px;" />
</div>

<div class="form-group  col-md-12">
    <label for="formInputphoto"> {{__('Photos')}}</label>

<div class="input-images"></div>

</div>



