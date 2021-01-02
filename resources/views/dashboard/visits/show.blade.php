@extends('dashboard.layouts.app')
@section('title'){!! __('back.Visit details') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'visits'])
@endsection
@section('content')

<div class="card">
    

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{__('back.IP Address')}}
                        </th>
                        <td>
                            {{ $visit->ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{__('back.Platform')}}
                        </th>
                        <td>
                            {{ $visit->platform }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{__('back.Browser')}}
                        </th>
                        <td>
                            {{ $visit->browser }}
                        </td>
                    </tr>
                    <tr>
                        <th>
  {{__('back.Time')}}
                          </th>
                        <td>
                            {{ $visit->readableDate }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{__('back.Url')}}
                        </th>
                        <td>
                            {{ $visit->url }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{__('back.Referer')}}
                        </th>
                        <td>
                            {{ $visit->referer }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{__('back.User Agent')}}
                        </th>
                        <td>
                            {{ $visit->useragent }}
                        </td>
                    </tr>
                </tbody>
            </table>
           
        </div>

       
    </div>
</div>
@endsection