<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $product->name !!}</td>
    <td>{!! $product->price !!}</td>
    <td>

        <div class="btn-group-horizantal action-option-group" role="group action-option-group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.products.edit',[$product->id]),
                    'tooltip' => __('Edit '.$product['name']),
                     ])
            @endcomponent
            </div>
              <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.products.show',$product->id),
                    'tooltip' => __('Show '.$product['full_name']),
                     ])
            @endcomponent
            </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$product->id,
                        'route' => route('system.products.destroy',$product->id) ,
                        'tooltip' => __('Delete '. $product['name'] ),
                         ])
            @endcomponent
                </div>
        </div>



    </td>
</tr>

