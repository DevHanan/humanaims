<tr>
    <td>{!! $loop->iteration  !!}</td>
    <td>{!! $vendor->name !!} <br>  {!! $vendor->fname !!} {!! $vendor->lname !!}</td>
    <td>{!! $vendor->email !!}</td>
    <td>{!! optional($vendor->country)->name !!}</td>
    <td><a href="{{route('system.bills.create',['vendor_id'=>$vendor->id])}}" data-toggle="tooltip" data-placement="top" title="{{__('Add bill')}}"
           class="btn btn-md btn-success style_btn">
            <i class="fa fa-plus-circle"></i> {{__('Add bill')}}
        </a></td>

    <td>

        <div class="btn-group-vertical action-option-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                    'route' => route('system.vendors.edit',$vendor->id),
                    'tooltip' => __('Edit '.$vendor['full_name']),
                     ])
            @endcomponent
            </div>
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._show_button',[
                    'route' => route('system.vendors.show',$vendor->id),
                    'tooltip' => __('Show '.$vendor['full_name']),
                     ])
            @endcomponent
            </div>
                <div class="btn-group" role="group">

            @component('dashboard.layouts.partials.buttons._delete_button',[
                        'id'=>$vendor->id,
                        'route' => route('system.vendors.destroy',$vendor->id) ,
                        'tooltip' => __('Delete '.$vendor['full_name']),
                         ])
            @endcomponent
                </div>
        </div>



    </td>
</tr>

