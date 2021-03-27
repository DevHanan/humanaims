@inject('currencies','App\Models\Currency')
@inject('taxes','App\Models\SaleTax')
@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<input type="hidden" name="bill_id" value="{{request()->id}}">
<div class="form-group  col-sm-12">
    <label for="date"> {{__('Date')}}</label>
    {!! Form::text('date',$bill->date??date('Y-m-d')??null,['id'=>'date','class'=>'form-control col datepicker',disable_on_show()]) !!}
    {{input_error($errors,'date')}}
</div>


<div class="row col-12">
    <div class="form-group    col-sm-12">
        {!! Form::text('note',null,['required','id'=>'note','class'=>' input-lg form-control col','placeholder'=>__("Note"),disable_on_show()]) !!}
        {{input_error($errors,'note')}}
    </div>
</div>

<div class="row col-12">
    <div class="form-group    col-sm-12">
        {!! Form::number('amount',null,['required','id'=>'amount','class'=>' input-lg form-control col','step'=>'any','placeholder'=>__("Amount"),disable_on_show()]) !!}
        {{input_error($errors,'amount')}}
    </div>
</div>

<div class="form-group  col-sm-12">
    <label for="payment_method_id"> {{__('Payment method')}} </label>
    {{ Form::select('payment_method_id', \App\Models\PaymentMethod::all()->pluck('name', 'id')->toArray(), null,['class'=>'select2-customer','placeholder'=>__('Select payment method'),disable_on_show()]) }}
    {{input_error($errors,'payment_method_id')}}
</div>

<div class="form-group  col-sm-12">
    <label for="account_id"> {{__('Account')}} </label>
    {{ Form::select('account_id', \App\Models\Account::all()->pluck('name', 'id')->toArray(), null,['class'=>'select2-customer','placeholder'=>__('Select account'),disable_on_show()]) }}
    {{input_error($errors,'account_id')}}
</div>
