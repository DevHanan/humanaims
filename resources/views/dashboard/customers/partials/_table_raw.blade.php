<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $customer->fname !!}</td>
    <td>{!! $customer->email !!}</td>
    <td>{!! $customer->phone !!}</td>

    <td>

        <div class="btn-group-horizantal action-option-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.customers.edit',$customer->id),
                    'tooltip' => __('Edit '.$customer['name']),
                     ])
            @endcomponent
            </div>
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.customers.show',$customer->id),
                    'tooltip' => __('Show '.$customer['full_name']),
                     ])
            @endcomponent
            </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$customer->id,
                        'route' => route('system.customers.destroy',$customer->id) ,
                        'tooltip' => __('Delete '.$customer['full_name']),
                         ])
            @endcomponent
                </div>
        </div>



    </td>
</tr>

