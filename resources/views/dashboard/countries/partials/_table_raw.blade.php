<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $specialization->name !!} </td>
   

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.countries.edit',$specialization->id),
                    'tooltip' => __('Edit '.$specialization['name']),
                     ])
            @endcomponent
            </div>
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.countries.show',$specialization->id),
                    'tooltip' => __('Show '.$specialization['name']),
                     ])
            @endcomponent
            </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$specialization->id,
                        'route' => route('system.countries.destroy',$specialization->id) ,
                        'tooltip' => __('Delete '.$specialization['name']),
                         ])
            @endcomponent
                </div>
        </div>



    </td>
</tr>

