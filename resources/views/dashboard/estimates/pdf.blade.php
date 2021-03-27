<!doctype html>


<html>

<head>
    <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources')}}/app-assets/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources')}}/app-assets/vendors/css/ui/prism.min.css">

        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources')}}/app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources')}}/app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources')}}/app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources')}}/app-assets/css/components.css">



        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/resources')}}/assets/css/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css') !!}/custom-style.css"/>

        <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->



    <body class="card invoice-page" id="invoice">
        <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row">
                <div class="col-sm-6 col-6 text-left pt-1">
                    <div class="media pt-1">
                        @if(isset(auth()->user()->logo))
                            <img src="{{url(auth()->user()->logo)}}" alt="{{auth()->user()->business_name}}"/>
                        @else
                            <img src="{{asset('assets/dashboard/resources')}}/app-assets/images/logo/logo.png" alt="company logo"/>
                        @endif

                    </div>
                </div>
                <div class="col-sm-6 col-6 text-right">
                    <h1>{{__('Estimate')}}</h1>
                    <div class="invoice-details mt-2">
                        <h6>{{__('ESTIMATE NO.')}}</h6>
                        <p>{{$estimate->number}}</p>
                        <h6 class="mt-2">{{__('ESTIMATE DATE')}}</h6>
                        <p>{{$estimate->date}}</p>
                    </div>
                </div>

            </div>
            <!--/ Invoice Company Details -->

            <!-- Invoice Recipient Details -->
            <div id="invoice-customer-details" class="row pt-2">
                <div class="col-sm-6 col-12 text-left">
                    <h5>{{__('Recipient')}}</h5>
                    <div class="recipient-info my-2">
                        <p>{{optional($estimate->customer)->name}}</p>
                        <p>{{optional($estimate->customer)->billing_address1}}</p>
                        <p>{{optional($estimate->customer)->billing_address2}}</p>
                        <p>{{optional($estimate->customer)->billing_city}}</p>
                        <p>{{optional(optional($estimate->customer)->status)->name}}</p>
                        <p>{{optional(optional($estimate->customer)->country)->name}}</p>

                    </div>
                    <div class="recipient-contact pb-2">
                        @if(isset($estimate->customer->email))
                            <p>
                                <i class="feather icon-mail"></i>
                                {{optional($estimate->customer)->email}}
                            </p>
                        @endif
                        @if(isset(optional($estimate->customer)->phone))
                            <p>
                                <i class="feather icon-phone"></i>
                                {{optional($estimate->customer)->phone}}
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
            <!--/ Invoice Recipient Details -->

            <!-- Invoice Items Details -->
            <div id="invoice-items-details" class="pt-1 invoice-items-table">
                <div class="row">
                    <div class="table-responsive col-12">
                        <table class="table table-borderless text-center">
                            <thead>
                            <tr>
                                <th>{{__('Items')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Quantity')}}</th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Tax')}}</th>
                                <th>{{__('Amount')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($estimate))
                                @foreach($estimate->products as $product)
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
                                            {{$product->price}} {{optional($estimate->currency)->code}}
                                        </td>
                                        <td>

                                            {{optional($product->tax)->name}}
                                        </td>

                                        <td>
                                            {{$product->amount}}
                                        </td>


                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="invoice-total-details" class="invoice-total-table">
                <div class="row">
                    <div class="col-7 offset-5">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>{{__('Subtotal')}}</th>
                                    <td>{{$estimate->sub_total}} {{optional($estimate->currency)->code}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('Tax')}}</th>
                                    <td>{{$estimate->total_tax}} {{optional($estimate->currency)->code}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('TOTAL')}}</th>
                                    <td>{{$estimate->amount}} {{optional($estimate->currency)->code}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice Footer -->
            <div id="invoice-footer" class="text-right pt-3">
                <p>{{$estimate->footer}}
                </p>
                {{--                    <p class="bank-details mb-0">--}}
                {{--                        <span class="mr-4">BANK: <strong>FTSBUS33</strong></span>--}}
                {{--                        <span>IBAN: <strong>G882-1111-2222-3333</strong></span>--}}
                {{--                    </p>--}}
            </div>
            <!--/ Invoice Footer -->

        </div>
    </body>
    <!-- invoice page end -->


</html>

