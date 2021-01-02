<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.IP Address')}}</th>
        <th scope="col">{{__('back.Platform')}}</th>
        <th scope="col">{{__('back.Browser')}}</th>
        <th scope="col">{{__('back.Time')}}</th>
                <th scope="col">{{__('back.Options')}}</th>

    </thead>
    <tbody>
    @foreach($visits as $visit)
        @include('dashboard.visits.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.IP Address')}}</th>
        <th scope="col">{{__('back.Platform')}}</th>
        <th scope="col">{{__('back.Browser')}}</th>
        <th scope="col">{{__('back.Time')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </tr>
    </tfoot>
</table>

