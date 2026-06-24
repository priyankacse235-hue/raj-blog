@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Sub Content</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Blog</li>
                        <li class="breadcrumb-item active">All Blog</li>
                        <li class="breadcrumb-item active">Manage Blog</li>
                        <li class="breadcrumb-item active">Edit Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Update {{ $blog_data->title }} Sub Content</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @if (\Session::has('success'))
                                        <div class="alert alert-success">
                                            <strong>{!! \Session::get('success') !!}</strong>
                                        </div>
                                    @endif
                                    @if (\Session::has('error'))
                                        <div class="alert alert-danger">
                                            <strong>{!! \Session::get('error') !!}</strong>
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <span>{{ $error }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Content Heading</label>
                                        <input type="text" class="form-control" name="heading" placeholder="Heading Of Content" value="{{ $content->heading }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Sub Content Image</label>
                                                <input type="file" name="image" onchange="readURL(this)" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Image Preview</label>
                                                <img class="img-fluid" src="{{ url('storage/'.$content->image) }}" alt="" id="image_preview" > 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-8">
                                    <label>Detail Of Sub Content</label>
                                    <textarea name="details"class="editor">{{ $content->content }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label class="">Show Blog To User</label>
                                        <input type="checkbox" value="1" name="show" {{ $content->show == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-info">Update Content</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </section>
</div>

@endsection

@section('js_content')
<script>
    function make_editor(n){
        ClassicEditor
            .create( n )
            .then( editor => {} )
            .catch( error => {
                    console.error( error );
        } );
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function(){
        var x = document.querySelectorAll(".editor");
        for (var i = 0; i < x.length; i++) {
            make_editor(x[i]);
        }
    })
</script>
    
@endsection