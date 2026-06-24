@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Happy Customers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Happy Customers</li> 
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
                            <div class="card-tools">
                                <a href="{{ route('happy-customers.create') }}" class="btn btn-sm btn-warning">Create</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="data_table" class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>SNO</th>
                                        <th>Name</th>
                                        <th>Designation</th> 
                                        <th>Description</th> 
                                        <th>Profile</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($customers)
                                        @if (count($customers) > 0)
                                            @foreach ($customers as $customer_key => $customer_item)
                                                <tr>
                                                    <td>{{ $customer_key+1 }}</td>
                                                    <td>{{ $customer_item->customer_name }}</td>
                                                    <td style="width: 30%">{{ $customer_item->designation }}</td> 
                                                    <td>{{ $customer_item->description }}</td>
                                                    <td>
                                                        <img style="width:80px;" src="{{ asset('storage/'.$customer_item->profile) }}" alt="Banner Image">
                                                    </td> 
                                                    <td>
                                                        <a href="{{ route('happy-customers.edit', $customer_item->id) }}" class="fa fa-edit btn-sm btn btn-warning" title="Edit Happy Customers"></a>
                                                        <form method="post" title="Delete Happy Customers" action="{{ route('happy-customers.destroy',$customer_item->id) }}" class="fa fa-trash-alt btn btn-danger btn-sm" onclick='return confirm("Are you sure to delete this!") ? $(this)[0].submit() : false'>
                                                            @csrf
                                                            @method('delete')
                                                        @method('delete')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endisset
                                </tbody>
                            </table>
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
         $("#data_table").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: [],
                pageLength: 20
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");
    </script>
@endsection

