<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $line->name !!} </td>
   <td>{!! optional($line->region)->name !!} </td>

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
                            @can('edit_lines')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.lines.edit',$line->id),
                    'tooltip' => __('Edit '.$line['name']),
                     ])
            @endcomponent
            </div>
            @endcan
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.lines.show',$line->id),
                    'tooltip' => __('Show '.$line['name']),
                     ])
            @endcomponent
            </div>
                            @can('delete_lines')

                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$line->id,
                        'route' => route('system.lines.destroy',$line->id) ,
                        'tooltip' => __('Delete '.$line['name']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

