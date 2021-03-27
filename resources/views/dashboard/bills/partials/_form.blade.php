@inject('customers','App\Models\Customer')

@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<div class="row col-12">
    <div class="form-group  col-md-4  col-sm-12">
        {!! Form::text('po_so',null,['required','id'=>'po_so','class'=>' input-lg form-control col','autocomplete'=>"off",'placeholder'=>__("P.O./S.O."),disable_on_show()]) !!}
        {{input_error($errors,'po_so')}}
    </div>
</div>
<div class="row col-12">
    <div class="form-group  col-md-4">
        <label for="customer_id"> {{__('Customer')}} </label>
        {{ Form::select('customer_id', $customers->all()->pluck('name','id')->toArray(), request()->customer_id ??null,['class'=>'select2-customer','placeholder'=>__('Select customer'),disable_on_show()]) }}
        {{input_error($errors,'customer_id')}}
    </div>




    <div class="form-group  col-md-4">
        <label for="date"> {{__('Date')}}</label>
        {!! Form::text('date',$bill->date??date('Y-m-d')??null,['id'=>'date','class'=>'form-control col datepicker','autocomplete'=>"off",disable_on_show()]) !!}
        {{input_error($errors,'date')}}
    </div>

    <div class="form-group  col-md-4">
        <label for="expire_on"> {{__('Expires on')}}</label>
        {!! Form::text('expire_on',$bill->expire_on??date('Y-m-d')??null,['id'=>'expire_on','class'=>'form-control col datepicker','autocomplete'=>"off",disable_on_show()]) !!}
        {{input_error($errors,'expire_on')}}
    </div>


    <div class="form-group  col-md-4">
        <label for="subheading"> {{__("Subheading")}}</label>
        {!! Form::text('subheading',null,['required','id'=>'subheading','class'=>' input-lg form-control col','autocomplete'=>"off",'placeholder'=>__("Subheading"),disable_on_show()]) !!}
        {{input_error($errors,'subheading')}}
    </div>

    <div class="form-group  col-md-4">
        <label for="footer"> {{__("Footer")}}</label>
        {!! Form::text('footer',null,['required','id'=>'footer','class'=>' input-lg form-control col','autocomplete'=>"off",'placeholder'=>__("Footer"),disable_on_show()]) !!}
        {{input_error($errors,'footer')}}
    </div>
    <div class="form-group  col-md-8">
        <label for="memo"> {{__("Notes")}}</label>
        {!! Form::textarea('memo',null,['rows'=>'2','required','id'=>'memo','class'=>' input-lg form-control col','autocomplete'=>"off",'placeholder'=>__("Notes"),disable_on_show()]) !!}
        {{input_error($errors,'memo')}}
    </div>
</div>
<div class="portlet-body col-md-12">
    <div class="table-responsive ">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{{__('Items')}}</th>
                <th>{{__('Description')}}</th>
                <th>{{__('Quantity')}}</th>
                <th>{{__('Price')}}</th>
                
                <th>{{__('Amount')}}</th>
                <th class="{{hidden_on_show()}}"></th>
            </tr>
            </thead>

            <tbody class="product-tbody">
            @if(isset($bill))
                @foreach($bill->products as $product)
                    <input type="hidden" name="products[{!! $loop->index !!}][id]" value="{!! $product->id !!}" >
                    <tr class="product-row">
                        <td>
                            <div class="form-group">
                                <select  name="products[{!! $loop->index !!}][product_id]"  class="form-control item-list">
                                    @foreach(\App\Models\Product::all() as $productSelect)
                                        <option @if($productSelect->id == $product->product_id) selected @endif value="{{$productSelect->id}}">{{$productSelect->name}}</option>
                                    @endforeach
                                </select>
                                <a data-toggle='modal' data-target='#addNewItem'><i class='fa fa-plus-circle'> {{__('Or add new')}}</i></a>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input class="form-control" {{disable_on_show()}} type="text" autocomplete="off" value="{!! $product->description !!}" name="products[{!! $loop->index !!}][description]" >
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input id="quantity{!! $loop->index !!}" class="form-control " {{disable_on_show()}} render="{!! $loop->index !!}"  autocomplete="off" onchange="changeLine(this)" step="any" type="number" value="{!! $product->quantity !!}" name="products[{!! $loop->index !!}][quantity]" >
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input id="price{!! $loop->index !!}" render="{!! $loop->index !!}" onchange="changeLine(this)" class="form-control" autocomplete="off" {{disable_on_show()}} step="any" type="number" value="{!! $product->price !!}" name="products[{!! $loop->index !!}][price]" >
                            </div>
                        </td>
                       

                        <td>
                            <div class="form-group">
                                <input readonly id="amount{!! $loop->index !!}" class="form-control amount disabled" step="any" type="number" value="{!! $product->amount !!}"  >
                            </div>
                        </td>
<input type="hidden" class="tax" id="taxh{!! $loop->index !!}" value="">
                        <td class="{{hidden_on_show()}}" >
                            <button {{hidden_on_show()}} type="button" class="btn btn-warning remove-product"> <i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>
        <div class="row {{hidden_on_show()}}">
            <div class="col-sm-6">
            <button {{hidden_on_show()}} type="button" class=" text-center btn btn-primary add-time"><i class="fa fa-plus"></i> {{__('Add a line')}}</button>
            </div>
            <div class="col-sm-6 text-right">
                <h6>{{__('Subtotal')}} : <span id="subtotal">{{$bill->sub_total ?? 0}}</span></h6> <br>
                <h6>{{__('Total')}} : <span id="total">{{$bill->amount ?? 0}}</span> </h6>
            </div>

        </div>

    </div>
</div>

@section('footer')
    <script>
        $(document).on('click','.add-time',function () {
            var len = $('.product-row').length;
            var body = $('.product-tbody');
            body.append(cityRow(len));
            //todo: add tax select like above;
        });

        $(document).on('click','.remove-product',function () {
            $(this).closest('tr').remove();
        });





        var cityRow=function (num) {
            return '  <tr class="product-row">\n' +
                '                                <td>\n' +
                '                                 <div class="form-group">\n' +
                '<select name="products['+num+'][product_id]" style="width: 120px;" class="form-control item-list">'+
                '<option   selected>{{__('Select item')}}</option>'+
                @foreach(\App\Models\Product::all() as $productSelect)'<option value="{{$productSelect->id}}">{{$productSelect->name}}</option>'+@endforeach
                '</select>'+
                '<a data-toggle=\'modal\' data-target=\'#addNewItem\'><i class=\'fa fa-plus-circle\'></i> {{__('Or add new')}}</a>\n'+
                '                                    </div>\n' +
                '                                    </td>\n' +
                '                                <td>  \n' +

                '                                 <div class="form-group">\n' +
                ' <input autocomplete="off" class="form-control" type="text"  name="products['+num+'][description]" required>\n' +
                '                                    </div>\n' +
                '                                    </td>\n' +
                '                                <td>  \n' +
                '                                <div class="form-group">\n' +
                ' <input autocomplete="off" class="form-control" value="0.00" id="quantity'+num+'" onchange="changeLine(this)" type="number" render="'+num+'" step="any"  name="products['+num+'][quantity]" required>\n' +
                '                                    </div></td>\n' +
                '                                <td>  \n' +
                '                                <div class="form-group">\n' +
                '                                            <input class="form-control" autocomplete="off" id="price'+num+'" render="'+num+'" onchange="changeLine(this)" value="0.00" type="number" step="any" name="products['+num+'][price]" required>\n' +
                '                                    </div></td>\n' +
                '                                <td>  \n' +
                '                                 <div class="form-group">\n' +
                
                '</div>'+
                '    <td>  \n' +
                '                                <div class="form-group">\n' +
                '                                            <input id="amount'+num+'" readonly value="0.00" class="form-control amount" disabled type="number" step="any" name="products['+num+'][amount]" required>\n' +
                '                                    </div></td>\n' +
                '<td>  \n' +
                '<input type="hidden" class="tax" id="taxh'+num+'" value="">\n'+
                '                                 <div class="form-group">\n' +
                '                                    <button type="button" class="btn btn-warning remove-product"> <i class="fa fa-trash-o"></i></button>\n' +
                '</div>'+
                '                                </td>\n' +
                '</tr>';

        }



        function changeLine(q){
            var render = q.getAttribute("render");
            var quantity = $('#quantity'+render).val();
            var price = $('#price'+render).val();
            $( "#myselect option:selected" ).text();
            var tax = $('#tax'+render+' option:selected').text();
            var taxval = $('#tax'+render+' option:selected').val();
            $('#amount'+render).val(quantity * price);
            if(getSecondPart(tax) == null){
                $('#taxh'+render).val(0);
            }else{
                $('#taxh'+render).val((getSecondPart(tax)*(quantity * price))/100);
            }

console.log($('#taxh'+render).val());
            var sumAmount = 0;
            var sumTax = 0;
            $('.amount').each(function(){
                sumAmount += parseFloat(this.value);
            });
            $('.tax').each(function(){
                sumTax += parseFloat(this.value);
            });

            $('#subtotal').text(sumAmount);

            $('#totaltax').text(sumTax);

            $('#total').text(sumAmount + sumTax);
        }
        function getSecondPart(str) {
            return str.split('-')[1];
        }
    </script>
@endsection
