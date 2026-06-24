@extends('master/admin_layout')
@section('content')
<link rel="stylesheet" href="{{ url('plugins/tags/tagify.css') }}">
<script src="{{ url('plugins/tags/jQuery.tagify.min.js') }}"></script>
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
      
                        <li class="breadcrumb-item active">All Blog</li>
                        <li class="breadcrumb-item active">Edit Blog</li>
                       
                                          
                    </ol>
                    <a href="javascript:history.back()" class="btn btn-primary">
  ← Go Back
</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if ($blog->is_blocked == 1)
                @if ($blog->is_blocked == 1 && $blog->activation_request)
                    <div class="alert alert-warning" role="alert" auto-hide="false">
                        <h4 class="alert-heading">This Blog Is Under Review For Reactivation</h4>
                        <p class="mb-0">
                            Our team is currently reviewing this blog. Please check back soon.
                        </p>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert" auto-hide="false">
                        <h4 class="alert-heading">This Blog Is Blocked Due To Below Spam Reports By Users</h4>
                        <p class="mb-0">
                            This blog is currently blocked and not accessible due to multiple spam reports from users. 
                            Please update your blog content to meet our community guidelines and submit it for review again.
                        </p>
                        <ul class="mt-2 mb-0">
                            @foreach ($spam_reasons as $spam_item)
                                <li>{{$spam_item}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endif
            <form method="post" action="{{ route('blog.update',$blog->id) }}" enctype="multipart/form-data">
                @method('put')
                @csrf 
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Select Categoires</label>
                                <select name="category" class="form-control text-uppercase select2">
                                    <option value="">Select Catgeory</option>
                                    @isset($categories)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $blog->cat_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Blog Title</label>
                                    <input type="text" class="form-control" onkeyup="create_slug(this.value)"
                                    onkeypress="return blockSpecialChar(event)" name="blog_title" value="{{ $blog->title }}" placeholder="Unique Blog Title" required> 
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Blog Image</label>
                                            <input type="file" name="blog_image"  onchange="readURL(this)" class="form-control">
                                            <label>Image Alter</label>
                                            <input type="text" placeholder="Image Description" name="image_name" class="form-control" value="{{ $blog->image_alt }}" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image Preview</label>
                                            <img class="image-fluid" src="{{ url('storage/'.$blog->image) }}" alt="" id="img_preview" style="width:80px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
    <label>Show Blog To User :</label><br>

    <i id="blogToggle"
   class="fas {{ $blog->active ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger' }} fa-3x"
   style="cursor:pointer;"></i>

<input type="hidden"
       name="show"
       id="showValue"
       value="{{ $blog->active }}">
</div>
                            
                            <div class="col-md-12">
                                <label>Short Descrition</label>
                                <textarea name="short_desc"class="form-control editor">{{ $blog->short_desc }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label>Blog Defination</label>
                                <textarea name="defination"class="form-control editor">{{ $blog->defination }}</textarea>
                            </div> 
                        </div>
                    </div> 
                </div>
                <div class="card card-default"> 
                        <div class="card-header bg-info">
                            <h3 class="card-title">Search Engine Optimization (SEO)</h3>
                        </div>

                        <div class="card-body"> 
                            <div class="row">   
                                <div class="col-md-12 form-group">
                                    <label>Page Link / Slug</label> <br>
                                    <input type="text" onkeypress="return blockSpecialChar(event)" class="form-control" id="slug" name="slug" value="{{$blog->slug}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Meta Title</label> <br>
                                    <input type="text" class="form-control" name="meta_title" placeholder="Page Title" value="{{ $blog->meta_title }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{ $blog->meta_keywords }}"> 
                                </div> 
                                <div class="col-md-12 form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_desc" id="meta_desc" class="form-control" required placeholder="Meta Desc....">{{ ($blog->meta_desc) }} </textarea> 
                                </div>  
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            @if ($blog->is_blocked && !$blog->activation_request)
                                <a class="btn btn btn-warning" href="{{ url('admin/request-activation', $blog->id) }}">Request For Activation Blog</a>
                            @endif
                            <button class="btn btn btn-info">Update Blog & SEO</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection

@section('js_content')
<script src="{{url('tags/jQuery.tagify.min.js')}}"></script> 
    <script>
        (function () {
            // The DOM element you wish to replace with Tagify
            var input = document.querySelector('input[name=meta_keywords]'); 
            new Tagify(input)
        })()
    </script>
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

        function make_editor(n) {
            const editor = CKEDITOR.replace(n, {
                height: 300,
                filebrowserUploadUrl: "{{ url('admin/image-upload?_token=' . csrf_token()) }}",
                filebrowserUploadMethod: 'form',
            });

            editor.on('dialogDefinition', function (ev) {
                // Intercept the Image dialog
                var dialogName = ev.data.name;
                var dialogDefinition = ev.data.definition;

                if (dialogName === 'image') {
                    var infoTab = dialogDefinition.getContents('info');
                    var browseButton = infoTab.get('browse');

                    if (browseButton) {
                        browseButton.onClick = function (dialog, i) {
                            openImageGallery(editor);
                        };
                    }
                }
            });
        }

        function make_editor_without_image(n) {
            CKEDITOR.replace(n, {
                height: 300,
                removePlugins: 'image,uploadimage,uploadfile',
                extraPlugins: 'clipboard',
                on: {
                    instanceReady: function (evt) {
                    var editor = evt.editor;

                    // Disable drag and drop of images
                    editor.document.on('drop', function (event) {
                        if (event.data.$.dataTransfer && event.data.$.dataTransfer.files.length > 0) {
                            event.data.preventDefault(true);
                            event.cancel();
                        }
                    });

                    // Disable paste of base64 images
                    editor.on('paste', function (e) {
                        var pastedData = (e.data && e.data.dataValue) || '';
                        if (pastedData.match(/<img[^>]+src="data:/i)) {
                            e.cancel();
                        }
                    });
                }
                }
            });
        }


        $(document).ready(function(){
            var x = document.querySelectorAll(".editor");
            for (var i = 0; i < x.length; i++) {
                if(i == 0){
                    make_editor_without_image(x[i])
                }else{
                    make_editor(x[i]);
                }    
            }
            
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
        function create_slug(title) {
            if (title !== '') {
                slug = title.toLowerCase();
                slug = slug.replaceAll(' ', '-')
            }
            $('#slug').val(slug);
        }


        function blockSpecialChar(e) {
            var k;
            document.all ? k = e.keyCode : k = e.which;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57) || k == 45 ||
                k == 95);
        }
        </script>
        
<script>
document.getElementById('blogToggle').addEventListener('click', function () {

    let hidden = document.getElementById('showValue');

    if(hidden.value == 1){
        hidden.value = 0;
        this.classList.remove('fa-toggle-on', 'text-success');
        this.classList.add('fa-toggle-off', 'text-danger');
    }else{
        hidden.value = 1;
        this.classList.remove('fa-toggle-off', 'text-danger');
        this.classList.add('fa-toggle-on', 'text-success');
    }

});
</script>
@endsection