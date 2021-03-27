<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.slider title')}}</th>

        <th scope="col">{{__('back.Options')}}</th>
    </thead>
    <tbody>
    @foreach($sliders as $slider)
        @include('dashboard.sliders.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
             <th scope="col">{{__('back.slider title')}}</th>

        <th scope="col">{{__('back.Options')}}</th>
    </tr>
    </tfoot>
</table>

