<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $contact->name !!} </td>
   

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
            @can('edit_categories')

            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.contacttypes.edit',$contact->id),
                    'tooltip' => __('Edit '.$contact['name']),
                     ])
            @endcomponent
            </div>
                            @endcan

                        @can('delete_categories')
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$contact->id,
                        'route' => route('system.contacttypes.destroy',$contact->id) ,
                        'tooltip' => __('Delete '.$contact['name']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

