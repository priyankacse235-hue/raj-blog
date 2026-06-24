@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Latest Contacts</h1>
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
                                All Contents
                            </h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SNO</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Company</th>
                                        <th>Interest</th>
                                        <th>Submitted At</th>
                                    </tr>
                                </thead>
                                <tbody id="content">                                    
                                    @if (count($contacts) > 0)
                                        @foreach ($contacts as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->first_name }}</td>
                                                <td>{{ $item->last_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->company_name }}</td>
                                                <td>{{ $item->interst }}</td>
                                                <td>{{ date('M d, Y',strtotime($item->created_at)) }}</td>
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