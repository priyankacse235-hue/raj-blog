@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Master</li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Create Category</h3>
                        <div class="card-tools">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" class="form-control" name="category" placeholder="Unique Category" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category Type</label>
                                    <select name="category_type" id="category_type" class="form-control" required>
                                        <option value="">Category Type</option>
                                        <option value="0">Blog</option>
                                        <option value="1">Template</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <input type="hidden" name="page" id="page" value="1">
                        <button class="btn btn btn-info">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                All Categories
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SNO</th>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="content">
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                               <td>
                                               {{ $item->created_at ? date('d M Y', strtotime($item->created_at)) : 'N/A' }}
                                                  </td>
                                               {{-- <td> {{ $item->created_by ?? '' }}</td> --}}
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
                                    @else
                                        <tr>
                                            <th colspan="4" class="text-center">No Category Found</th>
                                        </tr>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function make_editor(n){
            ClassicEditor
                .create( n )
                .then( editor => {} )
                .catch( error => {
                        console.error( error );
            } );
        }

        $(document).ready(function(){
            var x = document.querySelectorAll(".editor");
            for (var i = 0; i < x.length; i++) {
                make_editor(x[i]);
            }

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
                            url: '{{ url("admin/category_load_more") }}',
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
        })
    </script>
@endsection