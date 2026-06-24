@isset ($templates)
    @foreach ($templates as $key => $item)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ substr($item->created_by, 0, 10) }}</td>
            <td>
                @if ($item->status == 1)
                    <a href="{{ url('admin/template/status/'.$item->id) }}" title="Template Deactive" class="btn btn-warning">Active</a>
                @else
                    <a href="{{ url('admin/template/status/'.$item->id) }}" title="Template Active" class="btn btn-danger">Deactive</a>
                @endif
            </td>
            <td>
                <a href="{{ url('template-edit', $item->id) }}" class="rounded-circle fa fa-edit btn-sm btn btn-warning" title="Edit Category"></a>

                <a href="{{ url('admin/design-template', $item->id) }}" class="rounded-circle	fa fa-file-alt btn btn-success" title="Design Template"></a>

                <a href="{{ url('delete-template', $item->id) }}" class="rounded-circle fa fa-trash-alt btn-sm btn btn-danger" onclick="return confirm('Are you sure to delete this!')" title="Delete Blog Category"></a>
            </td>
        </tr>
    @endforeach
@endisset