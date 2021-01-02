<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $category->name !!} </td>
   

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="horizantal button group">
            @can('edit_categories')

            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.categories.edit',$category->id),
                    'tooltip' => __('Edit '.$category['name']),
                     ])
            @endcomponent
            </div>
                            @endcan

                        @can('delete_categories')
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$category->id,
                        'route' => route('system.categories.destroy',$category->id) ,
                        'tooltip' => __('Delete '.$category['name']),
                         ])
            @endcomponent
                </div>
                @endcan
        </div>



    </td>
</tr>

