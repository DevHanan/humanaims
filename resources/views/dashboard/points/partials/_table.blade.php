<table class="table table-striped dataex-html5-selectors data-table">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.point')}}</th>
        <th scope="col">{{__('back.min charge')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </thead>
    <tbody>
    @foreach($points as $point)
        @include('dashboard.points.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
       <th scope="col">{{__('back.point')}}</th>
        <th scope="col">{{__('back.min charge')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </tr>
    </tfoot>
</table>

