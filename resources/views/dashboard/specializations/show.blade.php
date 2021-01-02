@extends('dashboard.layouts.app')
@section('title'){!! __('back.Specialization details') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'specializations'])
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
 @if(isset($specialization))
                                  <table class="table ">
                                            
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{__('specialization Name')}} </th>
                                                    <td> {{$specialization->name }}</td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">{{__('Email')}} </th>
                                                    <td> {{$specialization->email }}</td>
                                                </tr>
                                                <tr>
                                    <th scope="col"> {{__('First Name')}}  </th>
                                    <td> {{$specialization->fname }}</td>
                                </tr>
                                 <tr>
                                    <th scope="col"> {{__('Last Name')}}  </th>
                                    <td> {{$specialization->lname }}</td>
                                </tr>
                                           
                                             <tr>
                                    <th scope="col"> {{__('Currency')}}  </th>
                                    <td> {{optional($specialization->currency)->codeName }}</td>
                                </tr>   
<tr>
                                 <th scope="col"> {{__('Country')}}  </th>
                                    <td> {{optional($specialization->country)->name }}</td>
                                </tr> 
<tr>
                                <th scope="col"> {{__('State')}}  </th>
                                    <td> {{optional($specialization->state)->name }}</td>
                                </tr> 
                                <tr>
                                 <th scope="col"> {{__('Address')}}  </th>
                                    <td> {{$specialization->address1 }}   / {{$specialization->address2 }}    </td>
                                </tr> 
                                                   <tr>
                                                    <th scope="row">{{__('Postal Code')}} </th>
                                                    <td> {{$specialization->postal_code }}</td>
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
                                                    <td> {{$specialization->account_number }}</td>
                                                </tr>

 <tr>
                                                    <th scope="row">{{__('Mobile')}} </th>
                                                    <td> {{$specialization->mobile }}</td>
                                                </tr>
                                                 <tr>
                                                    <th scope="row">{{__('Phone')}} </th>
                                                    <td> {{$specialization->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">{{__('Fix')}} </th>
                                                    <td> {{$specialization->fix }}</td>
                                                </tr>
                                                 <tr>
                                                    <th scope="row">{{__('   Toll Free')}} </th>
                                                    <td> {{$specialization->toll_free }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">{{__('Website')}} </th>
                                                    <td> {{$specialization->website }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                               
                               
                               
                                @endif

======= -->
                            {!! Form::model($specialization,['method'=>'put','class'=>'form']  ) !!}
                            @csrf()
                            <div class="row">
                                @include('dashboard.specializations.partials._form')
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

