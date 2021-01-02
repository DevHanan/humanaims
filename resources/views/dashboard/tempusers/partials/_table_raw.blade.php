<tr class="{{$user->status['color'] }}">
    <td>{!! $loop->iteration !!}</td>
    <td>{!! $user->fullname !!}</td>
    <td>{!! $user->email !!}</td>
        <td>{!! $user->status['name'] !!}</td>
    <td>{!! $user->created_at->diffForHumans() !!}</td>
    <td>{!! $user->updated_at->diffForHumans() !!}</td>
</tr>

