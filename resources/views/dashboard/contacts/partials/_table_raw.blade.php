<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $contact->name !!}</td>
<td>{!! $contact->phone !!}</td>
<td>{!! $contact->email !!}</td>

    <td>
        <div class="btn-group-horizantal" role="group" aria-label="Vertical button group">
            @can('show_contact')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.contacts.show',$contact->id),
                    'tooltip' => __('Show '.$contact['name']),
                     ])
            @endcomponent
            </div>
            @endcan

@can('replay_contact')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.contacts.show',$contact->id),
                    'tooltip' => __('Show '.$contact['name']),
                     ])
            @endcomponent
            </div>
            @endcan
                        @can('delete_contact')

                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$contact->id,
                        'route' => route('system.contacts.destroy',$contact->id) ,
                        'tooltip' => __('Delete '.$contact['name']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

