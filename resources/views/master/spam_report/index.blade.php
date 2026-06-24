@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Spam Reports</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <input type="hidden" name="page" id="page" value="1">
                        {{-- <li class="breadcrumb-item">
                            <a href="{{ url('admin/blog') }}" class="btn btn-sm btn-warning">Back</a>
                        </li> --}}
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
                                Blog Spam Reports
                            </h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SNO</th>
                                        <th>Blog Url</th>
                                        <th>Reasons</th>
                                        <th>Spam Count</th>
                                        <th>Activation Request</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="content">                                    
                                    @if (count($reports) > 0)
                                        @foreach ($reports as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class="{{ $item->is_blocked == 1 ? 'bg-danger' : '' }}">{{ $item->url }}</td>
                                                <td>{{ $item->reasons }}</td>
                                                <td>{{ $item->reason_count }}</td>
                                                <td>
                                                    @if ($item->activation_request)
                                                        The unblocking request has been submitted. Kindly review and proceed with unblocking the blog.
                                                    @else
                                                        NA
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->is_blocked == 1)
                                                        <a href="{{ url('admin/blog-unblock', $item->url) }}" class="btn btn-danger" title="Unblock Blog">Un Block</a>
                                                    @else
                                                        <a href="{{ url('admin/blog-block', $item->url) }}" class="btn btn-success" title="Block Blog">Block</a>
                                                    @endif

                                                    <a href="{{ make_blog_url($item->blog_id) }}" class="btn btn-warning" title="Blog URL">Blog Link</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">No Contact us forms</td>
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
        $(document).ready(function() {
            new DataTable('#data_table', {
                info: false,
                ordering: false,
                paging: false
            });

            var page = parseInt($('#page').val());
            var loading = true; // Prevent multiple requests
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 10) {
                    if (loading) {
                        $('#loader').show()
                        loading = false;
                        $('#loader').toggleClass('d-none')
                        $.ajax({
                            url: '{{ url("admin/contacts_load_more") }}',
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
        });

        function load_more_data(){
            
        }
    </script>
@endsection