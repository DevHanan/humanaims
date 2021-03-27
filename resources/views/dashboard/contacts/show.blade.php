@extends('dashboard.layouts.app')
@section('title'){!! __('back.Show Contact') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'contacts'])
@endsection
@section('content')

<div class="card">
  

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    
                    <tr>
                        <th>
                          {{__('back.createdTime')}}
                        </th>
                        <td>
                            {{ $contact->readableDate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        {{__('back.name')}}
                        </th>
                        <td>
                            {{ $contact->name }}
                        </td>
                    </tr>
 <tr>
                        <th>
                        {{__('back.email')}}
                        </th>
                        <td>
                            {{ $contact->email }}
                        </td>
                    </tr>
 <tr>
                        <th>
                        {{__('back.phone')}}
                        </th>
                        <td>
                            {{ $contact->phone }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                        {{__('back.body')}}
                        </th>
                        <td>
                            {{ $contact->message }}
                        </td>
                    </tr>
                 
                   
                </tbody>
            </table>
            
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
