@extends('dashboard.layouts.app')
@section('title'){!! __('back.Show Patient') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'patients'])
@endsection
@section('content')

<div class="card">
  

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    
                    <tr>
                        <th>
                          {{__('back.Full name')}}
                        </th>
                        <td>
                            {{ $patient->fullname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        {{__('back.Email')}}
                        </th>
                        <td>
                            {{ $patient->email }}
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