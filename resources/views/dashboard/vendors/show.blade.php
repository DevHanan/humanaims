@extends('dashboard.layouts.app')
@section('title'){!! __('Vendor Details') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'vendors'])
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
      <!--                       <div class="table-responsive">
 @if(isset($vendor))
                                  <table class="table ">
                                            
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{__('Vendor Name')}} </th>
                                                    <td> {{$vendor->name }}</td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">{{__('Email')}} </th>
                                                    <td> {{$vendor->email }}</td>
                                                </tr>
                                                <tr>
                                    <th scope="col"> {{__('First Name')}}  </th>
                                    <td> {{$vendor->fname }}</td>
                                </tr>
                                 <tr>
                                    <th scope="col"> {{__('Last Name')}}  </th>
                                    <td> {{$vendor->lname }}</td>
                                </tr>
                                           
                                             <tr>
                                    <th scope="col"> {{__('Currency')}}  </th>
                                    <td> {{optional($vendor->currency)->codeName }}</td>
                                </tr>   
<tr>
                                 <th scope="col"> {{__('Country')}}  </th>
                                    <td> {{optional($vendor->country)->name }}</td>
                                </tr> 
<tr>
                                <th scope="col"> {{__('State')}}  </th>
                                    <td> {{optional($vendor->state)->name }}</td>
                                </tr> 
                                <tr>
                                 <th scope="col"> {{__('Address')}}  </th>
                                    <td> {{$vendor->address1 }}   / {{$vendor->address2 }}    </td>
                                </tr> 
                                                   <tr>
                                                    <th scope="row">{{__('Postal Code')}} </th>
                                                    <td> {{$vendor->postal_code }}</td>
                                                </tr>



<tr>
    <td colspan="2">
     <h5 class="btn btn-primary" >
    {{__('additional information (optional)')}}
    </h5>
</td>
</tr>
 <tr>
                                                    <th scope="row">{{__('Account  Number')}} </th>
                                                    <td> {{$vendor->account_number }}</td>
                                                </tr>

 <tr>
                                                    <th scope="row">{{__('Mobile')}} </th>
                                                    <td> {{$vendor->mobile }}</td>
                                                </tr>
                                                 <tr>
                                                    <th scope="row">{{__('Phone')}} </th>
                                                    <td> {{$vendor->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">{{__('Fix')}} </th>
                                                    <td> {{$vendor->fix }}</td>
                                                </tr>
                                                 <tr>
                                                    <th scope="row">{{__('   Toll Free')}} </th>
                                                    <td> {{$vendor->toll_free }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">{{__('Website')}} </th>
                                                    <td> {{$vendor->website }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                               
                               
                               
                                @endif

======= -->
                            {!! Form::model($vendor,['method'=>'put','class'=>'form']  ) !!}
                            @csrf()
                            <div class="row">
                                @include('dashboard.vendors.partials._form')
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

