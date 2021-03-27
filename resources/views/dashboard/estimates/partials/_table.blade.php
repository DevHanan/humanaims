<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('Status') }}</th>
        <th scope="col">{{__('Date')}}</th>
        <th scope="col">{{__('Number')}}</th>
        <th scope="col">{{__('Customer')}}</th>
        <th scope="col">{{__('Amount')}}</th>
        <th scope="col">{{__('Options')}}</th>
    </thead>
    <tbody>
    @foreach($estimates as $estimate)
        @include('dashboard.estimates.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('Status') }}</th>
        <th scope="col">{{__('Date')}}</th>
        <th scope="col">{{__('Number')}}</th>
        <th scope="col">{{__('Customer')}}</th>
        <th scope="col">{{__('Amount')}}</th>
        <th scope="col">{{__('Options')}}</th>
    </tr>
    </tfoot>
</table>

