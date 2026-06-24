@extends('master/admin_layout')
@section('content') 
{{-- <link rel="stylesheet" href="{{ url('plugins/tags/tagify.css') }}">
<script src="{{ url('plugins/tags/jQuery.tagify.min.js') }}"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> --}}

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">{{ ucfirst(Request::segment(3)) }}</li>
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
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link {{ Request::segment(3) == 'wallet' ? 'active' : '' }}" href="#activity" data-toggle="tab">Wallet</a></li>
                                <li class="nav-item"><a class="nav-link {{ Request::segment(3) == 'invite-friend' ? 'active' : '' }}" href="#timeline" data-toggle="tab">Invite & Earn</a></li>
                                <li class="nav-item"><a class="nav-link {{ Request::segment(3) == 'my-profile' ? 'active' : '' }}" href="#settings"  data-toggle="tab">My profile</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane {{ Request::segment(3) == 'wallet' ? 'active' : '' }}" id="activity">
                
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="float-right btn-tool"><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>
                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i
                                                    class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i
                                                    class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="Type a comment">
                                    </div>
                
                
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Sarah Ross</a>
                                                <a href="#" class="float-right btn-tool"><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>
                                        <form class="form-horizontal">
                                            <div class="input-group input-group-sm mb-0">
                                                <input class="form-control form-control-sm"
                                                    placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                
                
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Adam Jones</a>
                                                <a href="#" class="float-right btn-tool"><i
                                                        class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="../../dist/img/photo1.png"
                                                    alt="Photo">
                                            </div>
                
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3"
                                                            src="../../dist/img/photo2.png" alt="Photo">
                                                        <img class="img-fluid" src="../../dist/img/photo3.jpg"
                                                            alt="Photo">
                                                    </div>
                
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3"
                                                            src="../../dist/img/photo4.jpg" alt="Photo">
                                                        <img class="img-fluid" src="../../dist/img/photo1.png"
                                                            alt="Photo">
                                                    </div>
                
                                                </div>
                
                                            </div>
                
                                        </div>
                
                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i
                                                    class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i
                                                    class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="Type a comment">
                                    </div>
                
                                </div>
                
                                <div class="tab-pane {{ Request::segment(3) == 'invite-friend' ? 'active' : '' }}" id="timeline">
                                    <div class="timeline timeline-inverse callout callout-info"> 
                                        <div class="time-label ml-3">
                                            <span class="bg-danger">
                                                Invite & Get Reward
                                            </span>
                                        </div>  
                                        @if ($invite != null)
                                            <div class="">
                                                <i class="fas fa-bullhorn bg-primary"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i></span>
                                                    <h3 class="timeline-header"><span class="font-weight-bold text-capitalize">{{ $invite->offer_title }}</span></h3>
                                                    <div class="timeline-body">
                                                        {{ $invite->terms }}
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <input type="hidden" id="referral_code" value="{{ url('registration/'.Auth::user()->referral_code) }}">
                                                        <button value="" class="btn btn-secondary w-50 copy_to_clipboard"><i class="far fa-clipboard"></i> | Share | Copy  Invition link</button> 
                                                    </div>
                                                </div> 
                                            </div> 
                                            @if ($first_blog !== null)
                                                <div>
                                                    <i class="fas fa-clock bg-gray"></i>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i></span>
                                                        <h3 class="timeline-header"><span class="text-capitalize font-weight-bold" >{{ $first_blog->offer_title }}</span></h3>
                                                        <div class="timeline-body">
                                                            {{ $first_blog->terms }}
                                                        </div> 
                                                    </div> 
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                    @if (count($referals) >= 1)
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="text-center">
                                                    <h3>
                                                        Joined Friends
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="card-body"> 
                                                @foreach ($referals as $item) 
                                                    <div class="timeline timeline-inverse  callout callout-success">
                                                        <div class="time-label ml-3">
                                                            <span class="bg-danger">
                                                                {{ ucfirst($item->name) }}
                                                            </span>
                                                        </div>
                                
                                
                                                        <div class="">
                                                            <i class="fas fa-plus bg-primary"></i>
                                                            <div class="timeline-item">
                                                                <span class="time"><i class="far fa-clock"></i> {{ substr($item->created_at,0, 10) }} | {{ date('h:i A', strtotime($item->created_at)) }}</span>
                                                                <h3 class="timeline-header"><span class="font-weight-bold">You Recievied ₹ {{ $item->amount }}</span></h3>
                                                            </div>
                                                        </div>
                                                        @if ($first_blog !== null && $first_blog->offer_status == 1)
                                                            <div>
                                                                <i class="fas fa-clock bg-gray"></i>
                                                                <div class="timeline-item">
                                                                    <span class="time"><i class="far fa-clock"></i> </span>
                                                                    <h3 class="timeline-header"><a href="#">Get ₹ 300 </a> if he/she Write First Approved Blog</h3> 
                                                                </div>
                                                            </div>  
                                                        @endif
                                                    </div>
                                                @endforeach 
                                            </div>
                                        </div>
                                    @endif

                                </div>
                
                                <div class="tab-pane {{ Request::segment(3) == 'my-profile' ? 'active' : '' }}" id="settings">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card card-primary card-outline">
                                                <div class="card-body box-profile">
                                                  <div class="text-center">
                                                    @if (Auth::user()->profile_photo_path == null)
                                                        <img class="profile-user-img img-fluid img-circle dyanmic_image" src="{{url('client/images/user.png')}}" alt="User profile picture" id="img_preview">
                                                    @else
                                                        <img class="profile-user-img img-fluid img-circle dyanmic_image" src="{{url('storage/'.Auth::user()->profile_photo_path)}}" alt="User profile picture" id="img_preview">
                                                    @endif
                                                  </div>
                                  
                                                  <h3 class="profile-username text-center">{{ Auth::user()->name; }}</h3>
                                  
                                                  <p class="text-muted text-center">{{ Auth::user()->email; }}</p> 
                                                  
                                                  <button onclick="$('#profile').click()" class="btn btn-primary btn-block">Change Profile</button>
                                                </div>
                                                <!-- /.card-body -->
                                              </div>
                                        </div>
                                        <div class="col-md-9">
                                            <form class="form-horizontal" action="{{ url('admin/invite-to-friend') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" class="d-none" name="profile_photo_path" id="profile" onchange="readURL(this)">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="Name" value="{{ Auth::user()->name; }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email"
                                                        class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="Jhonwick@gmail.com" name="email" value="{{ Auth::user()->email; }}">
                                                    </div>
                                                </div> 

<div class="form-group row">
    <label for="bio" class="col-sm-2 col-form-label">Bio</label>
    
    <div class="col-sm-10">
        <textarea 
            name="bio" 
            id="bio" 
            class="editor form-control" 
            rows="3"
            placeholder="Write something about yourself...">{{ Auth::user()->bio }}</textarea>
    </div>
</div>

                                                <div class="form-group row">
                                                    <div class="text-center col-sm-1">
                                                    </div>
                                                        <button type="submit" class="btn btn-danger">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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




<script src="{{ url('tags/jQuery.tagify.min.js') }}"></script>

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
 
            $('.copy_to_clipboard').click(function () {
                navigator.clipboard.writeText($('#referral_code').val());
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Link Copied To Clipboard',
                    autohide: true,
                    delay: 2000,
                    body: 'Referal Link copied to clipboard. & Share With Your Friend'
                })
            }); 
        }) 

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>


{{-- @section('js_content') --}}


<script>
$(document).ready(function () {

    /* -------------------------
        TAGIFY
    --------------------------*/
    let input = document.querySelector('input[name=meta_keywords]');
    if (input) {
        new Tagify(input);
    }

    /* -------------------------
        CKEDITOR (ALL .editor)
    --------------------------*/
    document.querySelectorAll(".editor").forEach(function (el) {

        if (el.id === "bio") {
            CKEDITOR.replace(el.id, {
                height: 300
            });
        } else {
            CKEDITOR.replace(el.id, {
                height: 300,
                filebrowserUploadUrl: "{{ url('admin/image-upload?_token=' . csrf_token()) }}",
                filebrowserUploadMethod: 'form'
            });
        }

    });

    /* -------------------------
        COPY TO CLIPBOARD
    --------------------------*/
    $('.copy_to_clipboard').click(function () {
        navigator.clipboard.writeText($('#referral_code').val());

        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Link Copied',
            autohide: true,
            delay: 2000,
            body: 'Referral link copied successfully'
        });
    });

    /* -------------------------
        BOOTSTRAP SWITCH
    --------------------------*/
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

});


/* -------------------------
    IMAGE PREVIEW
--------------------------*/
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


/* -------------------------
    SLUG GENERATOR
--------------------------*/
function create_slug(title) {
    if (title !== '') {
        let slug = title.toLowerCase().replaceAll(' ', '-');
        $('#slug').val(slug);
    }
}


/* -------------------------
    BLOCK SPECIAL CHAR
--------------------------*/
function blockSpecialChar(e) {
    var k = e.which || e.keyCode;
    return (
        (k > 64 && k < 91) ||
        (k > 96 && k < 123) ||
        k == 8 ||
        k == 32 ||
        (k >= 48 && k <= 57) ||
        k == 45 ||
        k == 95
    );
}


/* -------------------------
    BLOG TOGGLE
--------------------------*/
document.addEventListener('DOMContentLoaded', function () {

    let toggle = document.getElementById('blogToggle');

    if (toggle) {
        toggle.addEventListener('click', function () {

            let hidden = document.getElementById('showValue');

            if (hidden.value == 1) {
                hidden.value = 0;
                this.classList.remove('fa-toggle-on', 'text-success');
                this.classList.add('fa-toggle-off', 'text-danger');
            } else {
                hidden.value = 1;
                this.classList.remove('fa-toggle-off', 'text-danger');
                this.classList.add('fa-toggle-on', 'text-success');
            }

        });
    }

});

</script>

@endsection