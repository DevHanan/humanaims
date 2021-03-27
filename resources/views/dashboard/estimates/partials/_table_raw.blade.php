<tr>
{{--    <td>{!! $loop->iteration  !!}</td>--}}
    <td>
        <div class="chip chip-{{$estimate->status_show['color']}}">
            <div class="chip-body">
                <div class="chip-text">{{$estimate->status_show['name']}}</div>
            </div>
        </div>
    </td>
    <td>{!! $estimate->date !!}</td>
    <td>{!! $estimate->number  !!}</td>
    <td>{!! optional($estimate->customer)->name !!}</td>
    <td>{!! $estimate->amount !!} {!! optional($estimate->currency)->code !!}</td>

    <td>

        <div class="btn-group-vertical action-option-group" role="group" aria-label=" button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.estimates.edit',$estimate->id),
                    'tooltip' => __('Edit '.$estimate['number']),
                     ])
            @endcomponent
            </div>
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.estimates.show',$estimate->id),
                    'tooltip' => __('Show '.$estimate['number']),
                     ])
            @endcomponent
            </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._duplicate_button',[
                        'id'=>$estimate->id,
                        'route' => route('system.estimates.duplicate',$estimate->id) ,
                        'tooltip' => __('Duplicate '.$estimate['number']),
                         ])
            @endcomponent
                </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$estimate->id,
                        'route' => route('system.estimates.destroy',$estimate->id) ,
                        'tooltip' => __('Delete '.$estimate['number']),
                         ])
            @endcomponent
                </div>

            <div class="btn-group" role="group">

                @component('dashboard.layouts.partials.buttons._invoice_button',[
                            'id'=>$estimate->id,
                            'route' => route('system.estimates.convert',$estimate->id) ,
                            'tooltip' => __('Convert '.$estimate['number']),
                             ])
                @endcomponent
            </div>
        </div>



    </td>
</tr>

