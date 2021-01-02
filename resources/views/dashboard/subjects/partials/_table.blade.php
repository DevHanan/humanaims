<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.user')}}</th>
        <th scope="col">{{__('back.Date')}}</th>
        <th scope="col">{{__('back.Category')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </thead>
    <tbody>
    @foreach($subjects as $subject)
        @include('dashboard.subjects.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
       <th scope="col">{{__('back.user')}}</th>
        <th scope="col">{{__('back.Date')}}</th>
        <th scope="col">{{__('back.Category')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </tr>
    </tfoot>
</table>

