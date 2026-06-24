@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Blog</li>
                        <li class="breadcrumb-item active">Create Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
              
                <form method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-info">
                        <h3 class="card-title">Create New Blog</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Select Categoires</label>
                                <select name="category" class="form-control text-uppercase select2" required>
                                    <option value="">Select Catgeory</option>
                                    @isset($categories)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Blog Title</label>
                                    <input type="text" class="form-control" onkeyup="create_slug(this.value)"
                                    onkeypress="return blockSpecialChar(event)" name="blog_title" placeholder="Unique Blog Title" required> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Blog link</label>
                                <input name="slug"class="form-control" id="slug" onkeypress="return blockSpecialChar(event)">
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Blog Image</label>
                                            <input type="file" name="blog_image"  onchange="readURL(this)" class="form-control" required accept="image/*">
                                            <label>Image Alter <strong class="text-danger">(Image Name - For Better SEO)</strong></label>
                                            <input type="text" placeholder="Image Description" name="image_name" id="image_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Image Preview</label>
                                            <img class="image-fluid" src="" alt="" id="img_preview" style="width:80px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
    <label>Show Blog To User :</label><br>

  <i id="blogToggle"
   class="fas fa-toggle-on text-success fa-3x"
   style="cursor:pointer;"></i>

<input type="hidden"
       name="show"
       id="showValue"
       value="1">
</div>
                            
                            <div class="col-md-12">
                                <label>Short Descrition</label>
                                <textarea name="short_desc"class="form-control editor"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>Blog Defination</label>
                                <textarea name="defination" id="defination" class="form-control editor">
                                    {{-- @include('master\templates\sample') --}}
                                </textarea>
                            </div> 
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button class="btn btn btn-info">Create New Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<div class="modal" id="imageGalleryModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Select Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="gallery-images" class="row"></div>
        <input type="file" id="uploadImage">
        <button id="uploadBtn">Upload</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js_content')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var orignal_file_ame = $(input).val().split('\\').pop();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                $('#image_name').val(orignal_file_ame);
            }
        }
        function openImageGallery(editor) {
            $('#imageGalleryModal').modal('show');
            loadGalleryImages();

            // On click insert image
            $(document).off('click', '.gallery-image').on('click', '.gallery-image', function () {
                const url = $(this).data('src');
                editor.insertHtml('<img src="' + url + '" alt="" />');
                $('#imageGalleryModal').modal('hide');
            });

            // Upload new image
            $('#uploadBtn').off('click').on('click', () => {
                const file = $('#uploadImage')[0].files[0];
                const formData = new FormData();
                formData.append('file', file);
                formData.append('_token', '{{ csrf_token() }}');

                fetch('{{ url("admin/image-upload") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    alert('Image uploaded');
                    loadGalleryImages();
                });
            });
        }

        function loadGalleryImages() {
            fetch('{{ url("admin/gallery-images") }}')
                .then(res => res.json())
                .then(images => {
                    const gallery = $('#gallery-images').empty();
                    images.forEach(img => {
                        gallery.append(`
                            <div class="col-md-3">
                                <img src="${img.url}" data-src="${img.url}" class="gallery-image" style="width: 100%; cursor: pointer;" />
                            </div>
                        `);
                    });
                });
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
            }else{
                slug = '';
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
