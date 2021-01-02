<tr>
    <td>{!! $loop->iteration !!}</td>
    <td>{!! $doctor->fullname !!}</td>
    <td>{!! $doctor->email !!}</td>
    <td>

        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.doctors.show',$doctor->id),
                    'tooltip' => __('Show '.$doctor['fullname']),
                     ])
            @endcomponent
            </div>
                </div>
      



    </td>
</tr>

