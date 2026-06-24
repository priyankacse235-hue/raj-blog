@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Blogs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <input type="hidden" name="page" id="page" value="1">
                        <li class="breadcrumb-item active">Blog</li>
                        <li class="breadcrumb-item active">All Blogs</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card"> 
                        <div class="card-body">
                            <table id="data_table" class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SNO</th>
                                        <th>category</th>
                                        <th>Title</th>
                                        <th>Defination</th>
                                        {{-- <th>Image Name</th> --}}
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="content">
                                    @if (count($blogs) > 0)
                                        @foreach ($blogs as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}
                                                    @if ($item->is_blocked)
                                                        <strong class="{{ $item->is_blocked == 1 ? 'bg-danger' : '' }}">
                                                            <br>Your Blog is blocked due to Many Spam Reports Click edit icon to knoe more.
                                                        </strong>
                                                    @endif
                                                </td>
                                                <td><b>{{ $item->title }}</b></td>
                                                <td class="text-wrap">{!! substr($item->defination, 0, 200) !!}...</td>
                                                {{-- <td>{{ $item->image_alt }}</td> --}}
                                                {{-- <td>
    @if($item->active)
        <i class="fas fa-toggle-on text-success fa-2x"></i>
    @else
        <i class="fas fa-toggle-off text-danger fa-2x"></i>
    @endif
</td> --}}
<td>
    
    <a href="{{ url('admin/blog-status/'.$item->id) }}">
        @if($item->active)
            <i class="fas fa-toggle-on text-success fa-2x"></i>
        @else
            <i class="fas fa-toggle-off text-danger fa-2x"></i>
        @endif
    </a>
</td>
                                                <td>{{ substr($item->created_at, 0, 10) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/blog-duplicate/'. $item->id) }}" class="fa  fa-window-restore btn btn-success" title="Duplicate Blog"></a>
                                                    <a href="{{ route('blog.edit', $item->id) }}" class="fa fa-edit btn btn-warning" title="Edit this blog"></a>
                                                    
                                                    <a href="{{ url(make_blog_url($item->id)) }}"  target="_blank" class="btn btn-warning" title="Redirect To URL">LINK</a>
                                                    <form method="post" title="Delete this blog" action="{{ route('blog.destroy',$item->id) }}" class="fa fa-trash-alt btn btn-danger" onclick='return confirm("Are you sure to delete this!") ? $(this)[0].submit() : false'>
                                                        @csrf
                                                        @method('delete')
                                                    @method('delete')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div id="loader" class="d-none">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js_content')
    <script>
        // $("#data_table").DataTable({
        //         responsive: true,
        //         lengthChange: false,
        //         autoWidth: false,
        //         buttons: [],
        //         pageLength: 20,
        //         paging: false
        //     })
        //     .buttons()
        //     .container()
        //     .appendTo("#example1_wrapper .col-md-6:eq(0)");

        new DataTable('#data_table', {
            info: false,
            ordering: false,
            paging: false
        });

        var loading = true; // Prevent multiple requests
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 10) {
                if (loading) {
                    var page = parseInt($('#page').val());
                    $('#loader').show()
                    loading = false;    
                    
                    $('#loader').toggleClass('d-none')
                    $.ajax({
                        url: '{{ url("admin/blog_load_more") }}',
                        type: 'GET',
                        data: {
                            page: page
                        },
                        success: function(data) {
                            $('#content').append(data);
                            page++;
                            $('#page').val(page)
                            loading = true;
                            $('#loader').toggleClass('d-none')
                        }, error: function() {
                            console.log("Error loading data");
                            loading = true;
                            $('#loader').hide(); // Hide the loader in case of an error
                        }
                    });
                }
            }
        });
    </script>
@endsection

