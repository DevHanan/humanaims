<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $point->name !!} </td>
    <td> {!! optional($point->parent)->name !!} </td>
   

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
             @can('edit_point')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.points.edit',$point->id),
                    'tooltip' => __('Edit '.$point['name']),
                     ])
            @endcomponent
            </div>
            @endcan
           
            @can('delete_points')
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$point->id,
                        'route' => route('system.points.destroy',$point->id) ,
                        'tooltip' => __('Delete '.$point['name']),
                         ])
            @endcomponent
                </div>
            @endcan
        </div>



    </td>
</tr>

