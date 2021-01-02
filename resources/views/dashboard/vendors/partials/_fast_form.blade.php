
@inject('currencies','App\Models\Currency')
@inject('countries','App\Models\Country')

<div class="form-group  col-md-12">
    <label for="name"> {{__('Vendor Name')}}</label>
    {!! Form::text('name',null,['id'=>'name','required','class'=>'form-control col','placeholder'=>__("")]) !!}
    {{input_error($errors,'name')}}
</div>

<div class="form-group  col-md-12">
    <label for="email"> {{__('Email')}} </label>
    {!! Form::email('email',null,['id'=>'email','class'=>'form-control col']) !!}
    {{input_error($errors,'email')}}
</div>


<div class="form-group  col-md-12">
    <label for="formInputCurrency"> {{__('Currency')}} </label>
    {{ Form::select('currency_id', $currencies->all()->pluck('codeName', 'id')->toArray(), $vendor->currency_id??auth()->user()->currency_id??null,['class'=>'select2 ',disable_on_show(),'autocomplete'=>"off"]) }}
    {{input_error($errors,'currency_id')}}
</div>

<div class=" form-group col-md-12">
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseAdditionalInfo" role="button" aria-expanded="false" aria-controls="collapseAdditionalInfo">
        {{__('Enter additional information (optional)')}}
    </a>
</div>

<div class="collapse row col-12" id="collapseAdditionalInfo" style="width: 100%">
    <div class="form-group col-md-12">
        <label for="account_number"> {{__('Account Number')}}</label>
        {!! Form::text('account_number',null,['id'=>'account_number','class'=>'form-control col','placeholder'=>__("Account Number")]) !!}
        {{input_error($errors,'account_number')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="formInputLAddress1"> {{__('Address Line 1')}}</label>
        {!! Form::text('billing_address1',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'billing_address1')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="formInputAddress2"> {{__('Address Line 2')}}</label>
        {!! Form::text('billing_address2',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'billing_address2')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="formInputCity"> {{__('City')}}</label>
        {!! Form::text('billing_city',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'billing_city')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="billing_country_id"> {{__('Country')}} </label>
        {{ Form::select('billing_country_id', $countries->all()->pluck('name', 'id')->toArray(), null,['class'=>'select2' ,'placeholder'=>'--------' , 'id'=>'billing_country_id']) }}
        {{input_error($errors,'billing_country_id')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="billing_state_select"> {{__('Province/State')}} </label>
        {{ Form::select('billing_state_id',[] , null,['class'=>'select2','placeholder'=>'--------','id'=>'billing_state_select']) }}
        {{input_error($errors,'billing_state_id')}}
    </div>


    <div class="form-group  col-md-12">
        <label for="formInputPostalCode"> {{__('Postal/Zip code')}}</label>
        {!! Form::text('billing_postal_code',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'billing_postal_code')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="phone"> {{__('Phone')}}</label>
        {!! Form::text('phone',null,['id'=>'phone','class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'phone')}}
    </div>


    <div class="form-group  col-md-12">
        <label for="formInputFax"> {{__('Fax')}}</label>
        {!! Form::text('fax',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'fax')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="mobile"> {{__('Mobile')}}</label>
        {!! Form::text('mobile',null,['id'=>'mobile','class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'mobile')}}
    </div>
    <div class="form-group  col-md-12">
        <label for="toll_free"> {{__('Toll Free')}}</label>
        {!! Form::text('toll_free',null,['id'=>'toll_free','class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'toll_free')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="website"> {{__('Website')}}</label>
        {!! Form::text('website',null,['id'=>'website','class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'website')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="notes"> {{__('Notes')}}</label>
        {!! Form::textarea('notes',null,["id"=>'notes', 'class'=>'form-control col','placeholder'=>__("Notes")]) !!}
        {{input_error($errors,'notes')}}
    </div>


    <div class="col-md-12">
    <h1>{{__('Shipping')}}</h1>
    </div>


    <div class="form-group  col-md-12">
        <label for="shipping_country_id"> {{__('Country')}} </label>
        {{ Form::select('shipping_country_id', $countries->all()->pluck('name', 'id')->toArray(), null,['class'=>'select2' ,'placeholder'=>'--------' , 'id'=>'shipping_country_id']) }}
        {{input_error($errors,'shipping_country_id')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="shipping_state_select"> {{__('Province/State')}} </label>
        {{ Form::select('shipping_state_id',[] , null,['class'=>'select2','placeholder'=>'--------','id'=>'shipping_state_select']) }}
        {{input_error($errors,'shipping_state_id')}}
    </div>


    <div class="form-group  col-md-12">
        <label for="formInputLAddress1"> {{__('Address Line 1')}}</label>
        {!! Form::text('shipping_address1',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'shipping_address1')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="formInputAddress2"> {{__('Address Line 2')}}</label>
        {!! Form::text('shipping_address2',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'shipping_address2')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="formInputCity"> {{__('City')}}</label>
        {!! Form::text('shipping_city',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'shipping_city')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="formInputPostalCode"> {{__('Postal/Zip code')}}</label>
        {!! Form::text('shipping_postal_code',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'shipping_postal_code')}}
    </div>

    <div class="form-group  col-md-12">
        <label for="formInputAddress2"> {{__('Shipping instructions')}}</label>
        {!! Form::textarea('shipping_ instructions',null,['class'=>'form-control col','placeholder'=>__("")]) !!}
        {{input_error($errors,'shipping_ instructions')}}
    </div>
</div>





