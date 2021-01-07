@extends('dashboard.layouts.app')
@section('title'){!! __('back.Show Subject') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'subjects'])
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
                            {{ $subject->readableDate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        {{__('back.createdBy')}}
                        </th>
                        <td>
                            {{ optional($subject->member)->fullname }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                        {{__('back.body')}}
                        </th>
                        <td>
                            {{ $subject->body }}
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