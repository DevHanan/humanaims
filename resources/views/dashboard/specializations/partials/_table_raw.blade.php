<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $specialization->name !!} </td>
    <td> {!! optional($specialization->parent)->name !!} </td>
   

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
             @can('edit_specializations')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.specializations.edit',$specialization->id),
                    'tooltip' => __('Edit '.$specialization['name']),
                     ])
            @endcomponent
            </div>
            @endcan
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.specializations.show',$specialization->id),
                    'tooltip' => __('Show '.$specialization['name']),
                     ])
            @endcomponent
            </div>
            @can('delete_specializations')
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$specialization->id,
                        'route' => route('system.specializations.destroy',$specialization->id) ,
                        'tooltip' => __('Delete '.$specialization['name']),
                         ])
            @endcomponent
                </div>
            @endcan
        </div>



    </td>
</tr>

