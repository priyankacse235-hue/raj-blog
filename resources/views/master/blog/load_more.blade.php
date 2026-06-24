@foreach ($blogs as $key => $item)
    <tr class="{{ $sno % 2 == 0 ? 'even' : 'odd' }}">
        <td>{{ $sno++ }}</td>
        <td>{{ $item->name }}</td>
        <td><b>{{ $item->title }}</b></td>
        <td class="text-wrap">{!! substr($item->defination, 0, 200) !!}...</td>
        <td>{{ $item->image_alt }}</td>
        <td>
            <img style="width:80px;" src="{{ asset('storage/'.$item->image) }}" alt="Banner Image">
        </td>
        <td>{{ substr($item->created_at, 0, 10) }}</td>
        <td>
            <a href="{{ url('admin/blog-duplicate/'. $item->id) }}" class="fa  fa-window-restore btn btn-success" title="Duplicate Blog"></a>
            <a href="{{ route('blog.edit', $item->id) }}" class="fa fa-edit btn btn-warning" title="Edit this blog"></a>
            
            <a href="{{ url($item->name, $item->slug) }}"  target="_blank" class="fa fa-link  btn btn-warning" title="Redirect To URL"></a>
            <form method="post" title="Delete this blog" action="{{ route('blog.destroy',$item->id) }}" class="fa fa-trash-alt btn btn-danger" onclick='return confirm("Are you sure to delete this!") ? $(this)[0].submit() : false'>
                @csrf
                @method('delete')
            @method('delete')
            </form>
        </td>
    </tr>
@endforeach