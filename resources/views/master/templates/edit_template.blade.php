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
            <div class="card card-default">
                <form method="post" action="{{ url('admin/template-edit', $temp->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                        <div class="card-tools">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="category">Select Template Category</label>
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @isset($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $temp->cat_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Template Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Elegant birthday wishing template" required value="{{ $temp->title }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Template Full Url will be :</label>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name">Domain & Catgeory</label>
                                            <input type="text" name="url_domain" id="url_domain" class="form-control" placeholder="rkraj.in/categogy-name" value="{{ url($temp->catgeory)  }}/" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="name">Domain & Catgeory</label>
                                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Blog-title-will-be-here" value="{{ $temp->slug }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Tenplate Thumbnails</label>
                                            <input type="file" name="thumbnail" onchange="readURL(this)" accept="image/*" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image Preview</label>
                                            <img class="image-fluid" src="{{ url('storage/'.$temp->thumbnail) }}" alt="" id="img_preview" style="width:100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Template HTML</label>
                                    <textarea name="temp_html" id="temp_html" class="form-control" cols="30" rows="10">{{ $temp->thumbnail }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Template CSS</label>
                                    <textarea name="temp_css" id="temp_css" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Template JAVACRIPT</label>
                                    <textarea name="temp_js" id="temp_js" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <input type="hidden" name="domain" id="domain" value="rkraj.in/">
                        <input type="hidden" name="page" id="page" value="1">
                        <button class="btn btn btn-info">Update Template</button>
                    </div>
                </form>
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
        })
    </script>
@endsection