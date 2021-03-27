<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $slider->title !!} </td>



    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
            @can('edit_sliders')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.sliders.edit',$slider->id),
                    'tooltip' => __('Edit '.$slider['title']),
                     ])
            @endcomponent
            </div>
            @endcan
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.sliders.show',$slider->id),
                    'tooltip' => __('Show '.$slider['title']),
                     ])
            @endcomponent
            </div>
            @can('delete_sliders')
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$slider->id,
                        'route' => route('system.sliders.destroy',$slider->id) ,
                        'tooltip' => __('Delete '.$slider['title']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

