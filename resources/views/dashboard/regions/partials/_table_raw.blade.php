<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $region->name !!} </td>
    <td> {!! optional($region->parent)->name !!} </td>
   

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
             @can('edit_region')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.regions.edit',$region->id),
                    'tooltip' => __('Edit '.$region['name']),
                     ])
            @endcomponent
            </div>
            @endcan
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.regions.show',$region->id),
                    'tooltip' => __('Show '.$region['name']),
                     ])
            @endcomponent
            </div>
            @can('delete_regions')
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$region->id,
                        'route' => route('system.regions.destroy',$region->id) ,
                        'tooltip' => __('Delete '.$region['name']),
                         ])
            @endcomponent
                </div>
            @endcan
        </div>



    </td>
</tr>

