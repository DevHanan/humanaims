<!-- Add Customer Modal -->
<div class="modal fade text-left" id="addNewCustomer" tabindex="-1" role="dialog" aria-labelledby="newCustomerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="newCustomerLabel"> {{__('Add new customer')}}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {!! Form::open(['method'=>'post','route'=>'system.pages.store',
                            'class'=>'row customer-form']) !!}
                @csrf()

                    <input type="hidden" name="is_ajax" value="1">

                </form>
            </div>
            <div class="modal-footer">

                <button id="submit-customer" type="submit" class="btn btn-success">{!! __('Create') !!}</button>


                <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('Close')}}</button>
            </div>

        </div>
    </div>
</div>
<!-- Add Vendor Modal -->




