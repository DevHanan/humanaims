<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.Full name')}}</th>
        <th scope="col">{{__('back.Email')}}</th>
        <th scope="col">{{__('back.verified')}}</th>
        <th scope="col">{{__('back.created_at')}}</th>
        <th scope="col">{{__('back.updated_at')}}</th>

       
    </thead>
    <tbody>
    @foreach($users as $user)
        @include('dashboard.tempusers.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
         <th scope="col">{{__('back.Full name')}}</th>
        <th scope="col">{{__('back.Email')}}</th>
                <th scope="col">{{__('back.verified')}}</th>
         <th scope="col">{{__('back.created_at')}}</th>
                 <th scope="col">{{__('back.updated_at')}}</th>

        
    </tr>
    </tfoot>
</table>

