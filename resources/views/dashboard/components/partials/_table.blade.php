<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.Name')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </thead>
    <tbody>
    @foreach($components as $component)
        @include('dashboard.components.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.Name')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </tr>
    </tfoot>
</table>

