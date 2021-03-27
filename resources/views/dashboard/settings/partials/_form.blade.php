
        <div class="form-group  col-md-6"  >
    <label for="formInputSiteArabicTitle"> {{__('back.Site arabic Name')}}</label>
    {!! Form::text('site_name_ar',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'site_name_ar')}}
</div>


<div class="form-group  col-md-6"  >
    <label for="formInputSiteEnglishTitle"> {{__('back.Site English Name')}}</label>
    {!! Form::text('site_name_en',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'site_name_en')}}
</div>

<div class="form-group  col-md-6"  >
    <label for="formInputEmail"> {{__('back.Email')}}</label>
    {!! Form::text('email',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'email')}}
</div>

           <div class="form-group  col-md-6"  >
    <label for="formInputFacebook"> {{__('back.Facebook')}}</label>
    {!! Form::text('facebook',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'facebook')}}
</div>

<div class="form-group  col-md-6"  >
    <label for="formInputTwitter"> {{__('back.Twitter')}}</label>
    {!! Form::text('twitter',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'twitter')}}
</div>

<div class="form-group  col-md-6"  >
    <label for="formInputYoutube"> {{__('back.Youtube')}}</label>
    {!! Form::text('youtube',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'youtube')}}
</div>

<div class="form-group  col-md-6"  >
    <label for="formInputInstagram"> {{__('back.Instagram')}}</label>
    {!! Form::text('instagram',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'instagram')}}
</div>
     
        <div class="form-group  col-md-6"  >
    <label for="formInputAndriod"> {{__('back.Andriod')}}</label>
    {!! Form::text('andriod',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'andriod')}}
</div>

<div class="form-group  col-md-6"  >
    <label for="formInputIos"> {{__('back.Ios')}}</label>
    {!! Form::text('ios',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'ios')}}
</div>



<div class="form-group  col-md-12">
    <label for="formInputArabicDesc"> {{__('back.Terms  Arabic Heading')}}</label>
    {!! Form::textarea('terms_desc_ar',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'terms_desc_ar')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputEnglishDesc"> {{__('back.Terms  English Heading')}}</label>
    {!! Form::textarea('terms_desc_en',null,['class'=>'form-control col',
    'placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'terms_desc_en')}}
</div>
     





