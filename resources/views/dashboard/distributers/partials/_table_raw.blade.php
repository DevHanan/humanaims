<tr>
    <td>{!! $loop->iteration !!}</td>
    <td>{!! $user->name !!}</td>
    <td>{!! $user->email !!}</td>
        <td>
        @foreach($user->regions as $region)
                <span class="badge badge-info">{{ $region->name }}</span>
        @endforeach
    </td>
s
    <td>
        <div class="btn-group-horizantal" role="group" aria-label="horizantal button group">
            @can('edit_users')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.distributers.edit',$user->id),
                    'tooltip' => __('Edit '.$user['name']),
                     ])
            @endcomponent
            </div>
            @endcan
            @can('delete_users')
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$user->id,
                        'route' => route('system.distributers.destroy',$user->id) ,
                        'tooltip' => __('Delete '.$user['name']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

