<table class="table table-bordered">
  <tbody>
    <tr>
      <th scope="row">{{__('back.Log Name')}}</th>
      <td>{!! $log->log_name !!} </td>
     
    </tr>
    <tr>
      <th scope="row">{{__('back.Description')}}</th>
      <td>{!! $log->description !!} </td>
    </tr>
    <tr>
      <th scope="row">{{__('back.Done By')}}</th>
      <td colspan="2">{!! optional($log->user)->name !!} </td>
    </tr>
     <tr>
      <th scope="row">{{__('back.Date')}}</th>
      <td colspan="2">{!! $log->created_at !!} </td>
    </tr>
  </tbody>
</table>

