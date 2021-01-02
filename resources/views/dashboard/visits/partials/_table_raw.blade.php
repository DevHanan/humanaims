<tr>
    <td>{!! $loop->iteration !!}</td>
    <td>{!! $visit->ip !!}</td>
    <td>{!! $visit->platform !!}</td>
           <td>{!! $visit->browser !!}</td>
  <td>{!! $visit->readableDate !!}</td>

    <td>
        <div class="btn-group-horizantal" role="group" aria-label="horizantal button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.visits.show',$visit->id),
                    'tooltip' => __('back.Show'.$visit['ip']),
                     ])
            @endcomponent
            </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$visit->id,
                        'route' => route('system.visits.destroy',$visit->id) ,
                        'tooltip' => __('Delete '.$visit['name']),
                         ])
            @endcomponent
                </div>
        </div>



    </td>
</tr>

