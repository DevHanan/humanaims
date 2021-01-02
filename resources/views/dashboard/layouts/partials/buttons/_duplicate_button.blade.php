<button data-toggle="modal" data-target="#usersDuplicate{{$id}}" @if(isset($tooltip) ) {{tooltip($tooltip)}} @endif  class="btn btn-md btn-warning" >

    <i class="fa fa-angle-double-up"></i> {{__('Duplicate')}}
</button>

<!-- Modal -->
<div class="modal fade text-left" id="usersDuplicate{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1"> @if(isset($tooltip) )
{{$tooltip}}
                 @else {{__('Duplicate')}} @endif</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>{{__('Are you sure you want to duplicate record ?')}}</h5>
            </div>
            <div class="modal-footer">
                <form method="POST" action=
                    {{$route}}>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning">{!! __('Duplicate') !!}</button>

                </form>
                <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('Close')}}</button>
            </div>
        </div>
    </div>
</div>
