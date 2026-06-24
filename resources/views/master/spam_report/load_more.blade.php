@foreach ($contacts as $key => $item)
    <tr>
        <td>{{ $sno++ }}</td>
        <td>{{ $item->first_name }}</td>
        <td>{{ $item->last_name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->company_name }}</td>
        <td>{{ $item->interst }}</td>
        <td>{{ date('M d, Y',strtotime($item->created_at)) }}</td>
    </tr>
@endforeach