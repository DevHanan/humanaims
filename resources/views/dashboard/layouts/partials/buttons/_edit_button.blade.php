<a href="{{isset($route) ? $route : 'javascript:void(0);'}}" data-toggle="tooltip" data-placement="top" title="{{$tooltip}}"
    class="btn btn-md btn-success style_btn">
    <i class="fa fa-edit"></i> @if(isset($buttonText)) {{$buttonText }} @endif {{__('back.Edit')}}
</a>
