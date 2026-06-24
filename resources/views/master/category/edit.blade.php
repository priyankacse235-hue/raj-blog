@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Catgeory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Master</li>
                        <li class="breadcrumb-item active">Catgeory</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                    @method('put')
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
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="category" placeholder="Unique Category" required value="{{ $category->name }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category Type</label>
                                    <select name="category_type" id="category_type" class="form-control" required>
                                        <option value="">Category Type</option>
                                        <option value="0" {{ $category->type == 0 ? 'selected' : '' }}>Blog</option>
                                        <option value="1" {{ $category->type == 1 ? 'selected' : '' }}>Template</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button class="btn btn btn-info">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
