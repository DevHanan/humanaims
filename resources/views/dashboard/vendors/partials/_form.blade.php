
@inject('currencies','App\Models\Currency')
@inject('countries','App\Models\Country')

<div class="form-group  col-md-6">
    <label for="formInputFullName"> {{__('Vendor Name')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'name')}}
</div>



<div class="form-group  col-md-6">
    <label for="formInputRole"> {{__('Email')}} </label>
    {!! Form::email('email',null,['class'=>'form-control col',disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'email')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputFName"> {{__('First Name')}}</label>
    {!! Form::text('fname',null,['class'=>'form-control col',disable_on_show(),'autocomplete'=>"off",'placeholder'=>__(""),isset($readOnly)?$readOnly:null]) !!}
    {{input_error($errors,'fname')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputLName"> {{__('Last Name')}}</label>
    {!! Form::text('lname',null,['class'=>'form-control col',disable_on_show(),'autocomplete'=>"off",'placeholder'=>__(""),isset($readOnly)?$readOnly:null]) !!}
    {{input_error($errors,'lname')}}
</div>


<div class="form-group  col-md-6">
    <label for="formInputCurrency"> {{__('Currency')}} </label>
    {{ Form::select('currency_id', $currencies->all()->pluck('codeName', 'id')->toArray(), $vendor->currency_id??auth()->user()->currency_id??null,['class'=>'select2 ',disable_on_show(),'autocomplete'=>"off"]) }}
    {{input_error($errors,'currency_id')}}
</div>

<div class="form-group  col-md-6">
   <label for="formInputCountry"> {{__('Country')}} </label>
    {{ Form::select('country_id', $countries->all()->pluck('name', 'id')->toArray(), null,['class'=>'select2' ,disable_on_show(),'autocomplete'=>"off",'placeholder'=>'--------' , 'id'=>'country_id']) }}
   {{input_error($errors,'country_id')}}
</div>

<div class="form-group  col-md-6">
   <label for="formInputState"> {{__('Province/State')}} </label>
    {{ Form::select('state_id',[] , null,['class'=>'select2','placeholder'=>'--------','id'=>'state_select',disable_on_show(),'autocomplete'=>"off"]) }}
   {{input_error($errors,'state_id')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputLAddress1"> {{__('Address Line 1')}}</label>
    {!! Form::text('address1',null,['class'=>'form-control col',disable_on_show(),'autocomplete'=>"off",'placeholder'=>__(""),isset($readOnly)?$readOnly:null]) !!}
    {{input_error($errors,'address1')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputAddress2"> {{__('Address Line 2')}}</label>
    {!! Form::text('address2',null,['class'=>'form-control col',disable_on_show(),'autocomplete'=>"off",'placeholder'=>__(""),isset($readOnly)?$readOnly:null]) !!}
    {{input_error($errors,'address2')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputCity"> {{__('City')}}</label>
    {!! Form::text('city',null,['class'=>'form-control col',disable_on_show(),'autocomplete'=>"off",'placeholder'=>__(""),isset($readOnly)?$readOnly:null]) !!}
    {{input_error($errors,'city')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputPostalCode"> {{__('Postal/Zip code')}}</label>
    {!! Form::text('postal_code',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'postal_code')}}
</div>

<div class=" form-group col-md-12">
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseAdditionalinfo" role="button" aria-expanded="false" aria-controls="collapseAdditionalinfo">
    {{__('Enter additional information (optional)')}}
    </a>
</div>

<div class="row collapse" id="collapseAdditionalinfo">

        <div class="form-group col-md-6">
    <label for="formInputAccountNumber"> {{__('Account Number')}}</label>
    {!! Form::text('account_number',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'account_number')}}
</div>
<div class="form-group  col-md-6">
    <label for="formInputFax"> {{__('Fax')}}</label>
    {!! Form::text('fax',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'fax')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputPhone"> {{__('Phone')}}</label>
    {!! Form::text('phone',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'phone')}}
</div>
<div class="form-group  col-md-6">
    <label for="formInputMobile"> {{__('Mobile')}}</label>
    {!! Form::text('mobile',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'mobile')}}
</div>

<div class="form-group  col-md-6">
    <label for="formInputTollFree"> {{__('Toll Free')}}</label>
    {!! Form::text('toll_free',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'toll_free')}}
</div>
<div class="form-group  col-md-6">
    <label for="formInputMobile"> {{__('Website')}}</label>
    {!! Form::text('website',null,['class'=>'form-control col','placeholder'=>__(""),isset($readOnly)?$readOnly:null,disable_on_show(),'autocomplete'=>"off"]) !!}
    {{input_error($errors,'website')}}
</div>
  </div>







