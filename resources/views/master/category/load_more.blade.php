@foreach ($categories as $key => $item)
    <tr>
        <td>{{ $sno++ }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ substr($item->created_by, 0, 10) }}</td>
        <td>
            @if ($item->status == 1)
                <a href="{{ url('admin/category/status/'.$item->id) }}" title="Category Deactive" class="btn btn-warning">Active</a>
            @else
                <a href="{{ url('admin/category/status/'.$item->id) }}" title="Category Active" class="btn btn-danger">Deactive</a>
            @endif
        </td>
        <td>
            <a href="{{ route('category.edit', $item->id) }}" class="fa fa-edit btn-sm btn btn-warning" title="Edit Category"></a>
            <form method="post" title="Delete Blog Category" action="{{ route('category.destroy',$item->id) }}" class="fa fa-trash-alt btn btn-danger" onclick='return confirm("Are you sure to delete this!") ? $(this)[0].submit() : false'>
                @csrf
                @method('delete')
            </form>
        </td>
    </tr>
@endforeach