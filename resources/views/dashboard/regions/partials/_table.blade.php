<table class="table table-striped dataex-html5-selectors data-table">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.Name')}}</th>
        <th scope="col">{{__('back.Main Region')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </thead>
    <tbody>
    @foreach($regions as $region)
        @include('dashboard.regions.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.Name')}}</th>
        <th scope="col">{{__('back.Main Region')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </tr>
    </tfoot>
</table>

