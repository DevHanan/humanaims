<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $component->name !!} </td>
   

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
            @can('edit_components')

            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.components.edit',$component->id),
                    'tooltip' => __('Edit '.$component['name']),
                     ])
            @endcomponent
            </div>
                            @endcan

                        @can('delete_components')
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$component->id,
                        'route' => route('system.components.destroy',$component->id) ,
                        'tooltip' => __('Delete '.$component['name']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

