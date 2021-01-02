<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $role->name !!} </td>
    <td>
        @foreach($role->permissions as $permissionm)
                <span class="badge badge-info">{{ $permissionm->name }}</span>
        @endforeach
    </td>
   
    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.roles.edit',$role->id),
                    'tooltip' => __('Edit '.$role['name']),
                     ])
            @endcomponent
            </div>
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.roles.show',$role->id),
                    'tooltip' => __('Show '.$role['name']),
                     ])
            @endcomponent
            </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$role->id,
                        'route' => route('system.roles.destroy',$role->id) ,
                        'tooltip' => __('Delete '.$role['name']),
                         ])
            @endcomponent
                </div>
        </div>



    </td>
</tr>

