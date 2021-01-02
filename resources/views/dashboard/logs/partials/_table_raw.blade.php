<tr>
    <td>{!! $loop->iteration  !!}</td>
            <td>{!! $log->log_name !!} </td>
    <td>{!! $log->description !!} </td>
        <td>{!! optional($log->user)->name !!} </td>
                <td>{!! $log->readableDate !!} </td>


   

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
            
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.logs.show',$log->id),
                    'tooltip' => __('back.Show'.$log['log_name']),
                     ])
            @endcomponent
            </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$log->id,
                        'route' => route('system.logs.destroy',$log->id) ,
                        'tooltip' => __('back.Delete'.$log['log_name']),
                         ])
            @endcomponent
                </div>
        </div>



    </td>
</tr>

