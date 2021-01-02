<tr>
    <td>{!! $loop->iteration !!}</td>
    <td>{!! $patient->fullname !!}</td>
    <td>{!! $patient->email !!}</td>
    <td>

        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.patients.show',$patient->id),
                    'tooltip' => __('Show '.$patient['fullname']),
                     ])
            @endcomponent
            </div>
                
        </div>



    </td>
</tr>

