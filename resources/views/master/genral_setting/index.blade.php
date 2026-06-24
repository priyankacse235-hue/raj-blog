<h1>Site Genral Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Master</li>
                        <li class="breadcrumb-item active">Genral Setting</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-info">
                        <h3 class="card-title">Genral Setting - (Frontend Website)</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 custom_border">
                                <label>Site Name</label>
                                <input type="text" placeholder="Site Name" name="site_name" class="form-control" value="{{ $settings == null ? '' : $settings->site_name }}" required>
                            </div>
                            <div class="col-12 mt-3 custom_border">
                                <label>Logo</label>
                                <input type="file" placeholder="Site Logo" name="logo" class="form-control" value="{{ $settings == null ? '' : $settings->logo }}">
                                 <img style="width:100px" src="{{ url('storage/',($settings->logo ?? '')) }}" alt="">
                             </div> 
                           
                            <div class="col-12 mt-3 custom_border">
                                <label>Favicon</label>
                                <input type="file" name="favicon" class="form-control" value="{{ $settings == null ? '' : $settings->favicon }}">
                                <img style="width:100px" src="{{ url('storage/',$settings->favicon ?? '') }}" alt="">
                            </div>
                            <div class="col-12 mt-3 custom_border">
                                <label >Footer Text</label>
                                <input type="text" placeholder="Copyright © 2014-2021 AdminLTE.io. All rights reserved." name="footer" class="form-control" value="{{ $settings == null ? '' : $settings->footer_text }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button class="btn btn btn-warning">Update Information</button>
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
    </script>@extends('master/admin_layout')
@section('content')
<style>
    .custom_border{
        border-left: 5px solid rgba(129, 51, 230, 0.705);
    }
</style>
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
@endsection