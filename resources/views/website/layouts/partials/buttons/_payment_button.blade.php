<a href="{{isset($route) ? $route : 'javascript:void(0);'}}" data-toggle="tooltip" data-placement="top" title="{{$tooltip}}"
   class="btn btn-md btn-outline-success">
    <i class="fa fa-money"></i> @if(isset($buttonText)) {{$buttonText }} @endif {{__('Record payment')}}
</a>
