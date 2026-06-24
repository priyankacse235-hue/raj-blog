@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Social Media Links</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Master</li>
                        <li class="breadcrumb-item active">Social Media</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form method="post" action="{{ route('social-media.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-info">
                        <h3 class="card-title">Update Links (Frontend Website)</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Facebook Link</label>
                                <input type="text" class="form-control" name="facebook" placeholder="Paste Facebook Link" value="{{ $links->facebook ?? '' }}"> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instagram Link</label>
                                    <input type="text" class="form-control" name="instagram" placeholder="Paste Facebook Link" value="{{ $links->instagram ?? '' }}"">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>indeed</label>
                                    <input type="text" name="indeed" placeholder="Indeed Link" class="form-control"  value="{{ $links->indeed ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" class="form-control" name="youtube" placeholder="Youtube channel link"  value="{{ $links->youtube ?? '' }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Whatsapp</label>
                                <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp chat link"  value="{{ $links->whatsapp ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label>Mail Link</label>
                                <input type="text" class="form-control" name="gmail" placeholder="Gmail Address"  value="{{ $links->gmail ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button class="btn btn btn-info">Update Link</button>
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
        })
    </script>
@endsection