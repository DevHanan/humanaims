<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $user->name !!}</td>
    <td>{!! $user->email !!}</td>
        <td>
            @if(App::getLocale() == 'ar')
            {!! optional($user->roles[0])->name_ar !!}
            @else
            {!! optional($user->roles[0])->name_en !!}
            @endif
        </td>

    <td>
        <div class="btn-group-horizantal" role="group" aria-label="horizantal button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.users.edit',$user->id),
                    'tooltip' => __('Edit '.$user['name']),
                     ])
            @endcomponent
            </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$user->id,
                        'route' => route('system.users.destroy',$user->id) ,
                        'tooltip' => __('Delete '.$user['name']),
                         ])
            @endcomponent
                </div>
        </div>



    </td>
</tr>

