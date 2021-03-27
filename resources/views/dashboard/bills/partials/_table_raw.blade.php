<tr>
{{--    <td>{!! $loop->iteration  !!}</td>--}}
    <td>
        <div class="chip chip-{{$bill->status_show['color']}}">
            <div class="chip-body">
                <div class="chip-text">{{$bill->status_show['name']}}</div>
            </div>
        </div>
    </td>
    <td>{!! $bill->date !!}</td>
   <!--  <td>{!! $bill->number  !!}</td>
    <td>{!! optional($bill->vendor)->name !!}</td> -->
    <td>{!! $bill->amount !!} {!! optional($bill->currency)->code !!}</td>

    <td>

        <div class="btn-group-vertical action-option-group" role="group" aria-label=" button group" >
                @if(auth()->user()->type == 'distrib')
            <div class="btn-group " role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.bills.edit',$bill->id),
                    'tooltip' => __('Edit '.$bill['number']),
                     ])
            @endcomponent
            </div>
@endif
            <div class="btn-group " role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.bills.show',$bill->id),
                    'tooltip' => __('Show '.$bill['number']),
                     ])
            @endcomponent
            </div>
               @if(auth()->user()->type == 'distrib')
                <div class="btn-group " role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$bill->id,
                        'route' => route('system.bills.destroy',$bill->id) ,
                        'tooltip' => __('Delete '.$bill['number']),
                         ])
            @endcomponent
                </div>
@endif


        </div>



    </td>
</tr>

