<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $country->name !!} </td>
   

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
                            @can('edit_countries')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.countries.edit',$country->id),
                    'tooltip' => __('Edit '.$country['name']),
                     ])
            @endcomponent
            </div>
            @endcan
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.countries.show',$country->id),
                    'tooltip' => __('Show '.$country['name']),
                     ])
            @endcomponent
            </div>
                            @can('delete_countries')

                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$country->id,
                        'route' => route('system.countries.destroy',$country->id) ,
                        'tooltip' => __('Delete '.$country['name']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

