<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('Status') }}</th>
        <th scope="col">{{__('Date')}}</th>
       <!--  <th scope="col">{{__('Number')}}</th>
        <th scope="col">{{__('Vendor')}}</th> -->
        <th scope="col">{{__('Amount')}}</th>
        <th scope="col">{{__('Options')}}</th>
    </thead>
    <tbody>
    @foreach($bills as $bill)
        @include('dashboard.bills.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('Status') }}</th>
        <th scope="col">{{__('Date')}}</th>
      <!--   <th scope="col">{{__('Number')}}</th>
        <th scope="col">{{__('Vendor')}}</th> -->
        <th scope="col">{{__('Amount')}}</th>
        <th scope="col">{{__('Options')}}</th>
    </tr>
    </tfoot>
</table>

