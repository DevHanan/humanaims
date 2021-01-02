<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.Log Name')}}</th>
        <th scope="col">{{__('back.Description')}}</th>
        <th scope="col">{{__('back.Done By')}}</th>
                <th scope="col">{{__('back.createdTime')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </thead>
    <tbody>
    @foreach($logs as $log)
        @include('dashboard.logs.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.Log Name')}}</th>
        <th scope="col">{{__('back.Description')}}</th>
        <th scope="col">{{__('back.Done By')}}</th>
                        <th scope="col">{{__('back.createdTime')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </tr>
    </tfoot>
</table>

