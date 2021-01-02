
<div class="form-group  col-md-12">
    <label for="formInputArabictitle"> {{__('back.Arabic Title')}}</label>
    {!! Form::text('title_ar',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'title_ar')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputEnglishtitle"> {{__('back.English Title')}}</label>
    {!! Form::text('title_en',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'title_en')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputType"> {{__('back.type')}} </label>
    {{ Form::select('type',['about'=> 'About us' , 'privacy'=> 'privacyPolicy ' ], $page->type?? $page->type?? null,['class'=>'select2 ',disable_on_show(),'autocomplete'=>"off" , 'placeholder'=>'Please Select']) }}
    {{input_error($errors,'type')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputArabicBody"> {{__('back.Arabic Body')}}</label>
    {!! Form::textarea('body_ar',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'body_ar')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputEnglishName"> {{__('back.English Body')}}</label>
    {!! Form::textarea('body_en',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'body_en')}}
</div>

  <div class="form-group  col-md-12"> 
    <div class="custom-file">
    <input type="file" id="inputGroupFile01" name="image" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01"> {{__('back.Choose file')}}</label>
                                  {{input_error($errors,'image')}}

  </div>
<img id="blah" align='middle' src=" @if(isset($page->image)) {{asset($page->image)}} @else http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png @endif" alt="your image" title='' style="max-height: 200px;" />
</div>


