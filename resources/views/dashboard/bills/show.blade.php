@extends('dashboard.layouts.app')
@section('title'){!! __('Show Bill') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'bills'])
@endsection
@section('content')

    <div class="content-body">
        <!-- bill functionality start -->
        <section class="bill-print mb-1 d-print-none">
            <div class="row">

                <fieldset class="col-12 col-md-5 mb-1 mb-md-0">

                            <button class="btn btn-outline-primary" ftype="button">{{__('Send Bill')}}
                            </button>

                </fieldset>
                <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                    <button class="btn btn-primary btn-print mb-1 mb-md-0"><i
                            class="feather icon-file-text"></i> {{__('Print')}}
                    </button>
                    <a href="{{route('system.bills.pdf',$bill->id)}}" class="btn btn-outline-primary pdf  ml-0 ml-md-1">
                        <span class="pdfspan" role="status" aria-hidden="false"></span>
                        <i
                            class="feather icon-download"></i> {{__('Download as PDF')}}
                    </a>
                </div>
            </div>
        </section>
        <!-- bill functionality end -->
        <!-- bill page -->
        <section class="card bill-page" id="bill">
            <div id="bill-template" class="card-body">
                <!-- Bill Company Details -->
                <div id="bill-company-details" class="row">
                    <div class="col-sm-6 col-12 text-left pt-1">
                        <div class="media pt-1">
                            @if(isset(auth()->user()->logo))
                                <img src="{{url(auth()->user()->logo)}}" alt="{{auth()->user()->business_name}}"/>
                            @else
                                <img src="{{asset('assets/dashboard/resources')}}/app-assets/images/logo/logo.png" alt="company logo"/>
                            @endif

                        </div>
                    </div>
                    <div class="col-sm-6 col-12 text-right">
                        <h1>{{__('Bill')}}</h1>
                        <div class="bill-details mt-2">
                            <h6>{{__('Bill NO.')}}</h6>
                            <p>{{$bill->number}}</p>
                            <h6 class="mt-2">{{__('Bill DATE')}}</h6>
                            <p>{{$bill->date}}</p>
                        </div>
                    </div>

                </div>
                <!--/ Bill Company Details -->

                <!-- Bill Recipient Details -->
                <div id="bill-customer-details" class="row pt-2">
                    <div class="col-sm-6 col-12 text-left">
                        <h5>{{__('Recipient')}}</h5>
                        <div class="recipient-info my-2">
                            <p>{{optional($bill->customer)->fname}}</p>
                            <p>{{optional($bill->customer)->phone}}</p>
                            <p>{{optional($bill->customer)->email}}</p>
                            <p>{{optional(optional($bill->customer)->region)->name}}</p>


                        </div>
                        <div class="recipient-contact pb-2">
                            @if(isset(optional($bill->customer)->email))
                            <p>
                                <i class="feather icon-mail"></i>
                                {{optional($bill->customer)->email}}
                            </p>
                            @endif
                            @if(isset(optional($bill->customer)->phone))
                            <p>
                                <i class="feather icon-phone"></i>
                                {{optional($bill->customer)->phone}}
                            </p>
                                @endif
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 text-right">
                        <h5> {{auth()->user()->business_name}}</h5>
                        <div class="company-info my-2">
                            <p>{{optional(auth()->user()->country)->name}}</p>
                            <p>{{optional(auth()->user()->status)->name}}  {{auth()->user()->city}}</p>
                            <p>{{auth()->user()->address}}</p>
                        </div>
                        <div class="company-contact">
                            @if(isset(auth()->user()->email))
                            <p>
                                <i class="feather icon-mail"></i>
                                {{auth()->user()->email}}
                            </p>
                            @endif
                            @if(isset(auth()->user()->phone1))
                            <p>
                                <i class="feather icon-phone"></i>
                                {{auth()->user()->phone1}}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                <!--/ Bill Recipient Details -->

                <!-- Bill Items Details -->
                <div id="bill-items-details" class="pt-1 bill-items-table">
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-borderless text-center">
                                <thead>
                                <tr>
                                    <th>{{__('Items')}}</th>
                                    <th>{{__('Description')}}</th>
                                    <th>{{__('Quantity')}}</th>
                                    <th>{{__('Price')}}</th>

                                    <th>{{__('Amount')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($bill))
                                    @foreach($bill->products as $product)
                                        <tr class="product-row">
                                            <td>
                                                {{optional($product->product)->name}}
                                            </td>

                                            <td>
                                                {{$product->description}}
                                            </td>

                                            <td>
                                                {{$product->quantity}}
                                            </td>
                                            <td>
                                                {{$product->price}} {{optional($bill->currency)->code}}
                                            </td>
                                            

                                            <td>
                                                {{$product->amount}}
                                            </td>

                                            <td class="{{hidden_on_show()}}" >
                                                <button {{hidden_on_show()}} type="button" class="btn btn-warning remove-product"> <i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>

                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="bill-total-details" class="bill-total-table">
                    <div class="row">
                        <div class="col-7 offset-5">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                    
                                    
                                    <tr>
                                        <th>{{__('TOTAL')}}</th>
                                        <td>{{$bill->amount}} {{optional($bill->currency)->code}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bill Footer -->
                <div id="bill-footer" class="text-right pt-3">
                    <p>{{$bill->footer}}
                    </p>

                </div>
                <!--/ Bill Footer -->

            </div>
        </section>
        <!-- bill page end -->

    </div>

@endsection

@section('footer')
    <script>
        $(document).ready(function () {
            // print bill with button
            $(".btn-print").click(function () {
                $("#bill").show();
                window.print();
            //$('#bill').printThis();
            });
        });

        function printBill()
        {

        var divToPrint=document.getElementById('bill');

        var newWin=window.open('','Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

        newWin.document.close();

        setTimeout(function(){newWin.close();},10);

        }

        $(".pdf").click(function() {  //use a class, since your ID gets mangled
            $(".pdf").addClass("disabled");
            $('.pdfspan').addClass("spinner-border spinner-border-sm");      //add the class to the clicked element

        });
    </script>
@endsection
