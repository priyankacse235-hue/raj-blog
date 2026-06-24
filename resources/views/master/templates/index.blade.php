@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Templates</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Templates</li>
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
                        <div class="card-header">
                            <h3 class="card-title">
                                All Templates
                            </h3>
                            <div class="card-tools">
                                <a href="{{ url('admin/create-template') }}" class="btn btn-primary">Create Template</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SNO</th>
                                        <th>Category Name</th>
                                        <th>Title</th>
                                        <th>Thumbnail</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="content">
                                    @isset ($templates)
                                        @foreach ($templates as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->category_name }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                    <img class="image-fluid" src="{{ url('storage/'.$item->thumbnail) }}" alt="" id="" style="width:200px">
                                                </td>
                                                <td>{{ substr($item->created_by, 0, 10) }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <a href="{{ url('admin/template/status/'.$item->id) }}" title="Template Deactive" class="btn btn-warning">Active</a>
                                                    @else
                                                        <a href="{{ url('admin/template/status/'.$item->id) }}" title="Template Active" class="btn btn-danger">Deactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/template-edit', $item->id) }}" class="rounded-circle fa fa-edit btn-sm btn btn-warning" title="Edit Template"></a>

                                                    <a href="{{ url('admin/design-template', $item->id) }}"php artisan route:list | findstr design-template target="_blank" class="rounded-circle fa fa-file-alt btn-sm btn btn-success" title="Design Template"></a>

                                                    <a href="{{ url(make_template_url($item->id)) }}" target="_blank" class="rounded-circle btn-sm btn btn-success" title="Design Template">Link</a>

                                                    <a href="{{ url('admin/delete-template', $item->id) }}" class="rounded-circle fa fa-trash-alt btn-sm btn btn-danger" onclick="return confirm('Are you sure to delete this!')" title="Delete Template"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="4" class="text-center">No Template Found</th>
                                        </tr>
                                    @endisset
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

        function createSlug(text) {
            return text
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')               // remove special characters
                .split(/\s+/)                           // split into words
                // .filter(word => !disallowedWords.includes(word)) // remove disallowed words
                .join('-')                              // join with dashes
                .replace(/-+/g, '-');                   // replace multiple dashes with one
        }


        $(document).ready(function(){
            $('#name , #slug').on('keyup', function () {
                const titleText = $(this).val();
                const slug = createSlug(titleText);
                $('#slug').val(slug);
            });

            $('#category').on('change', function () {
                var selectedText = $(this).find('option:selected').text();
                var Domain = $('#domain').val().trim();
                $('#url_domain').val(Domain+createSlug(selectedText)+'/');
            });

            // new DataTable('#data_table', {
            //     info: false,
            //     ordering: false,
            //     paging: false
            // });

            
            var loading = true; // Prevent multiple requests
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 10) {
                    if (loading) {
                        var page = parseInt($('#page').val());
                        $('#loader').show()
                        loading = false;    
                        
                        $('#loader').toggleClass('d-none')
                        $.ajax({
                            url: '{{ url("admin/template_load_more") }}',
                            type: 'POST',
                            data: {
                                page: page,
                                _token : '{{ csrf_token() }}',
                            },
                            success: function(data) {
                                if(data != ''){
                                    $('#content').append(data);
                                    page++;
                                    $('#page').val(page)
                                    loading = true;
                                }else{
                                    loading = false;
                                    $('#loader').toggleClass('d-none')
                                }
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