@extends('dashboard.layouts.app')
@section('title'){!! __('back.Product Details') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'products'])
@endsection

@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@yield('title')</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                  <!--           <div class="table-responsive">
                                @if(isset($product))
                                <table class="table">
                                    <tbody>
                                          <tr>
                                    <th scope="col"> {{__(' Name')}}  </th>
                                    <td> {{$product->name }}</td>
                                </tr>
                                 <tr>
                                    <th scope="col"> {{__('Description')}}  </th>
                                    <td> {{$product->description }}</td>
                                </tr>
                                 <tr>
                                    <th scope="col"> {{__('Price')}}  </th>
                                    <td> {{$product->price }}</td>
                                </tr>
                                    @if(isset($product->is_sell) && $product->is_sell ==1 )
                                 <tr>
                                    <th scope="col"> {{__('Is Sell')}}  </th>
                                    <td> True </td>
                                </tr>
                                @endif
                               @if(isset($product->is_buy) && $product->is_buy ==1 )
                                 <tr>
                                    <th scope="col"> {{__('Is Buy')}}  </th>
                                    <td> True </td>
                                </tr>
                                @endif
                                 <tr>
                                    <th scope="col"> {{__('Sale Tax')}}  </th>
                                    <td> {{ optional($product->sale)->name }}</td>
                                </tr>
                                @if(isset($product->expense_account_id))
                                <tr>
                                    <th scope="col"> {{__('Expenses Account')}}  </th>
                                    <td> {{ optional($product->expenseAccount)->name }}</td>
                                </tr>
                                @endif
                                 @if(isset($product->income_accunt_id))
                                <tr>
                                    <th scope="col"> {{__('Income Account')}}  </th>
                                    <td> {{ optional($product->incomeAccount)->name }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th scope="col"> {{__('Description')}}  </th>
                                    <td> {{ $product->description }}</td>
                                </tr>
                                    </tbody>
                                   
                                 
                                </table>
                                @endif -->

                            {!! Form::model($product,['method'=>'put','class'=>'form']  ) !!}
                            @csrf()
                            <div class="row">
                                @include('dashboard.products.partials._form')

                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

