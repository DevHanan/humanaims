<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('back.name')}}</th>
        <th scope="col">{{__('back.email')}}</th>
        <th scope="col">{{__('back.phone')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        @include('dashboard.contacts.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th scope="col">{{__('#') }}</th>
      <th scope="col">{{__('back.name')}}</th>
        <th scope="col">{{__('back.email')}}</th>
        <th scope="col">{{__('back.phone')}}</th>
        <th scope="col">{{__('back.Options')}}</th>
    </tr>
    </tfoot>
</table>

