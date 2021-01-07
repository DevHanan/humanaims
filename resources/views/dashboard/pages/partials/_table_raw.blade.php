<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $page->title !!} </td>
       <td>{!! $page->type !!} </td>


    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
            @can('edit_pages')
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.pages.edit',$page->id),
                    'tooltip' => __('Edit '.$page['title']),
                     ])
            @endcomponent
            </div>
            @endcan
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.pages.show',$page->id),
                    'tooltip' => __('Show '.$page['title']),
                     ])
            @endcomponent
            </div>
            @can('delete_pages')
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$page->id,
                        'route' => route('system.pages.destroy',$page->id) ,
                        'tooltip' => __('Delete '.$page['title']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

