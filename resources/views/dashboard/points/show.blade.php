@extends('dashboard.layouts.app')
@section('title'){!! __('back.Region details') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'regions'])
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
 @if(isset($region))
                                  <table class="table ">
                                            
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{__('region Name')}} </th>
                                                    <td> {{$region->name }}</td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">{{__('Email')}} </th>
                                                    <td> {{$region->email }}</td>
                                                </tr>
                                                <tr>
                                    <th scope="col"> {{__('First Name')}}  </th>
                                    <td> {{$region->fname }}</td>
                                </tr>
                                 <tr>
                                    <th scope="col"> {{__('Last Name')}}  </th>
                                    <td> {{$region->lname }}</td>
                                </tr>
                                           
                                             <tr>
                                    <th scope="col"> {{__('Currency')}}  </th>
                                    <td> {{optional($region->currency)->codeName }}</td>
                                </tr>   
<tr>
                                 <th scope="col"> {{__('Country')}}  </th>
                                    <td> {{optional($region->country)->name }}</td>
                                </tr> 
<tr>
                                <th scope="col"> {{__('State')}}  </th>
                                    <td> {{optional($region->state)->name }}</td>
                                </tr> 
                                <tr>
                                 <th scope="col"> {{__('Address')}}  </th>
                                    <td> {{$region->address1 }}   / {{$region->address2 }}    </td>
                                </tr> 
                                                   <tr>
                                                    <th scope="row">{{__('Postal Code')}} </th>
                                                    <td> {{$region->postal_code }}</td>
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
                                                    <td> {{$region->account_number }}</td>
                                                </tr>

 <tr>
                                                    <th scope="row">{{__('Mobile')}} </th>
                                                    <td> {{$region->mobile }}</td>
                                                </tr>
                                                 <tr>
                                                    <th scope="row">{{__('Phone')}} </th>
                                                    <td> {{$region->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">{{__('Fix')}} </th>
                                                    <td> {{$region->fix }}</td>
                                                </tr>
                                                 <tr>
                                                    <th scope="row">{{__('   Toll Free')}} </th>
                                                    <td> {{$region->toll_free }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">{{__('Website')}} </th>
                                                    <td> {{$region->website }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                               
                               
                               
                                @endif

======= -->
                            {!! Form::model($region,['method'=>'put','class'=>'form']  ) !!}
                            @csrf()
                            <div class="row">
                                @include('dashboard.regions.partials._form')
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

