<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.Name')}}</th>
        <th scope="col">{{__('back.Region')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </thead>
    <tbody>
    @foreach($lines as $line)
        @include('dashboard.lines.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.Name')}}</th>
        <th scope="col">{{__('back.Region')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </tr>
    </tfoot>
</table>

