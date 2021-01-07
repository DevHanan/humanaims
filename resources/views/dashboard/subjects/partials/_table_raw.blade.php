<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! optional($subject->subjectable)->fullname !!}</td>
    <td>{!! $subject->created_at !!}</td>
        <td>{!! optional($subject->category)->name !!}</td>
    <td>
        <div class="btn-group-horizantal" role="group" aria-label="Vertical button group">
            @can('show_subject')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.subjects.show',$subject->id),
                    'tooltip' => __('Show '.$subject['name']),
                     ])
            @endcomponent
            </div>
            @endcan
                        @can('delere_subject')

                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$subject->id,
                        'route' => route('system.subjects.destroy',$subject->id) ,
                        'tooltip' => __('Delete '.$subject['name']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

