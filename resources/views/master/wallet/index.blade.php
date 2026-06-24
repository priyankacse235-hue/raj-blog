@extends('master/admin_layout')
@section('content')
<div class="content-wrapper">
    @include('master.layout.message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Wallet Advanced Setting</h1>
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
                <form method="post" action="{{ route('wallet-setting.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-info">
                        <h3 class="card-title">Modify Wallet Settings</h3>
                    </div>

                    <div class="card-body">
                        <div class="row callout callout-info">
                            <div class="col-sm-4">
                                <label for="offer_status_1">Invite Reward</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="checkbox" name="offer_status_1" value="{{ $data_1 == null ? 1 : $data_1->offer_status }}" class="inputs"  checked data-bootstrap-switch data-off-color="danger" data-on-color="primary">  
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label for="offer_amount_1">Invite Friend In Ruppes</label>
                            </div>
                            <div class="col-sm-8 mt-2">
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="150" name="offer_amount_1" class="form-control mt-2" value="{{ $data_1 == null ? '' : $data_1->offer_amount }}">
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label for="offer_title_1">Offer Title</label>
                            </div>
                            <div class="col-sm-8 mt-2">
                                <input type="text" placeholder="Invitation Reward" value="{{ $data_1 == null ? '' : $data_1->offer_title }}" name="offer_title_1" class="form-control mt-2">
                                <input type="hidden" name="position_1" value="invite">
                            </div>

                            <div class="col-sm-4 mt-4">
                                <label for="terms_1">Terms & Condition</label>
                            </div>
                            <div class="col-sm-8 mt-2">
                                <textarea name="terms_1" class="w-100" placeholder="Offer Terms & Condition"> {{ $data_1 == null ? '' : $data_1->terms }} </textarea>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row callout callout-info">
                            <div class="col-sm-4">
                                <label for="offer_status_2">First Create Blog Reward</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="checkbox" name="offer_status_2" value="{{ $data_2 != null ? $data_2->offer_status : 1 }}" checked data-bootstrap-switch data-off-color="danger" class="inputs" data-on-color="primary"> 
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label for="offer_amount_2">First Blog Reward In Ruppes</label>
                            </div>
                            <div class="col-sm-8 mt-2">
                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="50" name="offer_amount_2" class="form-control mt-2" value="{{ $data_2 == null ? '' : $data_2->offer_amount }}">
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label for="offer_title_2">Offer Title</label>
                            </div>
                            <div class="col-sm-8 mt-2">
                                <input type="text" placeholder="First Blog Reward" name="offer_title_2" class="form-control mt-2" value="{{ $data_2 == null ? '' : $data_2->offer_title }}">
                                <input type="hidden" name="position_2" value="first_blog">
                            </div>
                            <div class="col-sm-4 mt-4">
                                <label for="terms_2">Terms & Condition</label>
                            </div>
                            <div class="col-sm-8 mt-2">
                                <textarea name="terms_2" class="w-100" placeholder="Offer Terms & Condition">{{ $data_2 == null ? '' : $data_1->terms }}</textarea>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                    </div>

                    <div class="card-footer text-center">
                        <button class="btn btn btn-info">Update Setting</button>
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

            $('.inputs').each(function(){
                if($(this).val() == 0){
                    $(this).prop('checked', false)
                }else{
                    $(this).prop('checked', true)
                }
            })
            
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

            $('.bootstrap-switch-label, .bootstrap-switch-handle-off, .bootstrap-switch-handle-on').click(function(){
                var inp_ = $(this).parent().find('input:checkbox'); 
                if(inp_.prop('checked')){
                    console.log('ddd'); 
                }else{
                    console.log('fff'); 
                }
            })
        })
    </script>
@endsection