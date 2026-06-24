@extends('user.layout')
@section('title', ucfirst($blog->title))
@section('content')
<style>
  .selectable-option {
    cursor: pointer;
    transition: all 0.2s;
  }
  .selectable-option.border-primary {
    border-width: 2px !important;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    background-color: #e9f5ff; /* Light blue background */
  }
  .blocked-message {
      max-width: 100%;
      padding: 30px;
      border: 1px solid #dc3545;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: center;
  }
  .blocked-message .icon {
      color: #dc3545;
      font-size: 4rem;
      margin-bottom: 15px;
  }
  .blocked-message h4 {
      font-weight: bold;
      color: #dc3545;
  }
  .blocked-message p {
      color: #08121c;
  }
  .comment_image{
    width: 50px;
    height: 50px;
  }
  .highlight {
    background-color: #92b9d981; /* light yellow */
    transition: background-color 0.5s ease;
  }


  .bio-tooltip {
    position: absolute;
    background: #ffffff;
    color: #333;
    padding: 12px 16px;
    border-radius: 10px;
    font-size: 13px;
    z-index: 99999;
    max-width: 280px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    border: 1px solid #eee;
    pointer-events: none;
    line-height: 1.4;

}
</style>
  {{-- <section class="bread-container wow fadeInUp">
    <div class="container"> 
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0 mb-0">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
        </ol>
      </nav>
    </div>
  </section> --}}

  {{-- <section class="pb-4">
    <div class="blog-head-con">
      <div class="container">
        <div class="blog-search-head">
            <form action="">
                <div class="row">
                  <div class="col-md-6">
                    <div class="category-dropdown">
                      <select class="form-select">
                        <option value="">Categories</option>
                          @isset($categories)
                              @foreach ($categories as $categories_key => $categories_item)
                                  <option value="{{ $categories_item->id }}" {{ $blog->cat_id == $categories_item->id ? 'selected' : ''  }}>{{ $categories_item->name }}</option>
                              @endforeach
                          @endisset
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <form>
                      <div class="blog-search">
                        <input type="text" class="form-control" placeholder="Search blog, topics ETC" />
                        <button class="icon-magnifier icons search-b-btn"></button>
                      </div>
                    </form>
                  </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </section> --}}

  
  <section class="blogdetails-con">
    <div class="container">
      @include('user.layout.message')
      @if ($blog->is_blocked)
        <div class="row">
          <div class="col-12 mt-2">
            <div class="blocked-message">
              <div class="icon">
                  <i class="fa fa-exclamation-triangle"></i>
              </div>
              <h2>Blog Blocked</h2>
              <p class="h5">"This blog is currently blocked due to multiple spam reports. If you are the author of this blog, please edit your content and resolve the issue to request reactivation."</p>
            </div>
          </div>
        </div>
      @else
        @if ($blog->active)
          @empty(!$blog)
            <h1>{{ $blog->title }}</h1>
            <p>
              {!! $blog->short_desc !!}
            </p>
            <div class="d-flex justify-content-between my-3">
              <div class="d-flex align-items-center blog-writtenby">
                {{-- <div class="admin-img"> --}}
                 <div class="admin-img" data-bio="{{ $blog->bio ?? 'No bio available' }}">
                  @empty(!$blog->profile)
                    <img alt="Created by" src="{{ url('storage/',$blog->profile) }}" /></div><strong>By </strong>&nbsp;
                  @else  
                    <img src="{{url('images/user.png')}}" /></div>By &nbsp;
                  @endempty
                  <strong>
                    {{ ucfirst($blog->writter) }}
                  </strong>
                 
                </div>
            
                <div class="blog-date">
                  <i class="icon-eye icons"></i> {{ $blog->view_count }} <br>
                  <i class="icon-calendar icons"></i> {{ date('M d, Y',strtotime($blog->created_at)) }}
                  <button type="button" class="btn" title="Spam Report" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-exclamation-triangle"></i>
                  </button>
                </div>
              </div>
    
            <div class="details-img mb-3">
              <img src="{{ url('storage/'.$blog->image) }}" class="img-fluid" alt="{{ $blog->image_alt }}" />
            </div>
            {!! $blog->defination !!}  
          @else
            <div class="row mt-2 mb-5">
              <div class="col-6">
                <h4>Blog not found....? Go to home</h4>
                <a class="btn btn-primary w-100" href="{{ url('/') }}">Home</a>
              </div>
            </div>
          @endempty
        @else
          <div class="row">
            <div class="col-12 mt-2">
              <div class="blocked-message">
                <div class="icon">
                    <i class="fa fa-exclamation-triangle"></i>
                </div>
                <h2>This Blog Temprary Diabled by Author</h2>
                <p class="h5">"This blog has been temporarily disabled by the author. Please check back later for updates or changes."</p>
                <a class="btn btn-primary w-100" href="{{ url('/') }}">Home</a>
              </div>
            </div>
          </div>
        @endif
      @endif
  </section>

  <div class="container mt-5" id="writeComment">
    <!-- Comment Form -->
    <div class="card mb-4">
        <div class="card-body">
          <div class="card-header">
            <h5 class="card-title">Leave a Comment
            </h5>
            <h6>
              You can post comment without Login as (unknow user)
            </h6>
          </div>
          <div class="card-body">
            <form action="{{ url('post-comment') }}" id="blog-comment" method="POST">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="comment" id="commentText" rows="4" placeholder="Write your comment here..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block" id="commentBox">
                    <i class="fa fa-paper-plane" style="color: #ffffff;"></i> Post Comment
                </button>
       
                <button type="button" class="d-none" data-toggle="modal" data-target="#commentConfirmModal" id="comment_modal">
                </button>
            </form>
          </div>
        </div>
    </div>

    <!-- Comments List -->
    <div class="card comment_section {{ $total_comments == 0 ? 'd-none' : ''}}">
        <div class="card-body">
            <h5 class="card-title">Comments (<span id="comment_count">{{ $total_comments }}</span>)</h5>
            <div class="all-comments">
              @isset($comments)
                @foreach($comments as $comment)
                  {{-- <x-comments :comment="$comment" /> --}}
                  @include('components\comments', ['comment' => $comment])
                @endforeach
              @endisset
            </div>
        </div>
        <div class="card-footer">
          <input type="hidden" name="total_comments" id="total_comments" value="{{ $total_comments }}">
          <button type="submit" class="btn btn-primary btn-block {{ $total_comments > 5 ? '' : 'd-none' }}" id="load_more_comments" data-limit="5">
              See More Comments
          </button>
        </div>
    </div>
  </div>

  <div class="container mt-2 mb-4">
    {{-- <h4>Recommended</h4> --}}
    {{-- <a href="devops+and+cloud+computing%2fcan-you-become-a-morning-person%3f-sleep-scientists-say-it-is-possible-with-these-key-tips">
      <div class="row mt-5">
        <div class="col-lg-3">
          <div class="img-cats">
            <img src="http://127.0.0.1:8000/storage/blog-images/1727006155img66e9ee35ce3009a0fac71032.webp" class="rounded w-100" alt="What is Bazooka">
          </div>
        </div>
        <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
          <h4></h4><h2>What makes someone a morning person or a night owl?</h2>
          <div class="d-flex justify-content-between mt-3">
              <div class="blog-writtenby"><strong>By</strong> RK</div>
              <div class="blog-date"><i class="icon-calendar icons"></i> Sep 22, 2024</div>
          </div>
        </div>
      </div>              
    </a> --}}
  </div>

  <!-- Modal -->
  <div class="modal fade" id="commentConfirmModal" tabindex="-1" role="dialog" aria-labelledby="commentConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="commentConfirmModalLabel">Post Comment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          Are you sure you want to post this comment as an <strong>anonymous user</strong>, or do you want to <strong>register/login</strong> and post with your own name?
        </div>
        
        <div class="modal-footer">
           <button type="button" class="btn btn-secondary rounded-pill" id="postAnonymouslyBtn">Continue as Anonymous</button> 
          <a href="{{ url('registration?redirecturl=') }}{{ request()->path(); }}" class="btn btn-primary">Register / Login</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{ url('spam-report') }}" method="POST">
          @csrf
          <input type="hidden" name="url" value="{{ $blog->slug }}">
          <input type="hidden" name="blog_id" id="blog_id" value="{{ $blog->id }}">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Report as Spam</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <div class="modal-body">
            <div class="row">

              <!-- Option Box -->
              <div class="col-12 mb-2">
                <input type="radio" name="reason" id="reason1" value="Spam or unwanted advertising" class="d-none">
                <div class="selectable-option border rounded p-3" data-target="#reason1">
                  Spam or unwanted advertising
                </div>
              </div>

              <div class="col-12 mb-2">
                <input type="radio" name="reason" id="reason2" value="Fake or misleading information" class="d-none">
                <div class="selectable-option border rounded p-3" data-target="#reason2">
                  Fake or misleading information
                </div>
              </div>

              <div class="col-12 mb-2">
                <input type="radio" name="reason" id="reason3" value="Abusive or hateful content" class="d-none">
                <div class="selectable-option border rounded p-3" data-target="#reason3">
                  Abusive or hateful content
                </div>
              </div>

              <div class="col-12 mb-2">
                <input type="radio" name="reason" id="reason4" value="Sexually explicit or inappropriate content" class="d-none">
                <div class="selectable-option border rounded p-3" data-target="#reason4">
                  Sexually explicit or inappropriate content
                </div>
              </div>

              <div class="col-12 mb-2">
                <input type="radio" name="reason" id="reason5" value="Copyright infringement" class="d-none">
                <div class="selectable-option border rounded p-3" data-target="#reason5">
                  Copyright infringement
                </div>
              </div>

              <div class="col-12 mb-2">
                <input type="radio" name="reason" id="reason6" value="Other" class="d-none">
                <div class="selectable-option border rounded p-3" data-target="#reason6">
                  Other
                </div>
              </div>

              <!-- Other text input -->
              <div class="form-group m-2" id="other_reason_input" style="display: none;">
                <label for="other_reason">Please specify:</label>
                <input type="text" class="form-control" name="other_reason" id="other_reason">
              </div>

            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-primary-outline" data-dismiss="modal">Cancle</button>
            <button type="submit" class="btn btn-success disabled" id="submit-report">Save changes</button>
          </div>
        </form>        
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
      function validateSpamReason() {
        var selectedReason = $('input[name="spam_reason"]:checked').val();
        
        if (!selectedReason) {
          // No option selected
          $('#submit-report').removeClass('disabled');
          return;
        }

        if (selectedReason === 'Other') {
          // If "Other" selected, check input
          var otherValue = $('#other_reason').val().trim();
          if (otherValue.length > 0) {
            $('#submit-report').removeClass('disabled');
          } else {
            $('#submit-report').addClass('disabled');
          }
        } else {
          // Any other option selected
          $('#submit-report').removeClass('disabled');
        }
      }

      function clearDraft(blogId = '') {
        blogId = $('#blog_id').val()
        localStorage.removeItem('draft_comment_' + blogId);
        $('#commentText').val(''); // Clear textarea
      }

      $(document).ready(function(){
        let pendingComment = null;
        const isLoggedIn = parseInt($('[name="is_logged_in"]').val());

        let blogId = $('#blog_id').val();
        let savedComment = localStorage.getItem('draft_comment_' + blogId);

        if (savedComment) {
            $('#commentText').val(savedComment);
        }

        $('#other_reason').on('input', function() {
          validateSpamReason(); // Call validation on typing
        });
        
        $.ajax({
          url : '{{ url("add_view_count") }}',
          type : 'post',
          data : {
            slug : '{{ Request::segment(2) }}',
            _token : '{{ csrf_token() }}',
          },
          success : function(data){
            
          }
        })

        $('#load_more_comments').click(function(){
          let total_comments = parseInt($('#total_comments').val());
          let loaded_comments = $('.all-comments .single-comment').length;
          let limit = parseInt($(this).attr('data-limit')) || 5;

          if (loaded_comments >= total_comments) {
              $(this).addClass('disabled').text('No more comments');
              return;
          }

          $(this).addClass('disabled')
          $.ajax({
            url : '{{ url("load_comments") }}',
            type : 'post',
            data : {
              _token : '{{ csrf_token() }}',
              limit : limit,
              offset : loaded_comments,
              blog_id : $('#blog_id').val(),
            },
            success : function(data){
              if(data.status){
                $('.all-comments').append(data.comment)
                setTimeout(() => {
                  $('.all-comments .highlight').removeClass('highlight');
                  $(this).removeClass('disabled')
                }, 1200);
                // If after appending we reach total, disable button
                if ($('.all-comments .single-comment').length >= total_comments) {
                    $('#load_more_comments').addClass('disabled').text('No more comments');
                }
              }
            }
          })
        })

        $('.selectable-option').click(function() {
          // Remove active state from all
          $('.selectable-option').removeClass('border-primary active');
          
          // Add active state to selected
          $(this).addClass('border-primary active');
          
          // Check the corresponding radio input
          var targetRadio = $(this).data('target');
          $(targetRadio).prop('checked', true);
          
          // Show/Hide other input
          if (targetRadio === '#reason6') {
            $('#other_reason_input').show();
          } else {
            $('#other_reason_input').hide();
            $('#other_reason').val('');
          }
          validateSpamReason();
        });

        $('#commentText').on('keyup', function () {
          let blogId = $('#blog_id').val()
          let comment = $(this).val().trim();

          if (comment.length > 0) {
              localStorage.setItem('draft_comment_' + blogId, comment);
          }else{
            clearDraft(blogId)
          }
        });

        $('#blog-comment').on('submit', function (e) {
          e.preventDefault();

          let blogId = $('#blog_id').val();
          let comment = localStorage.getItem('draft_comment_' + blogId);

          if (!comment || comment.trim() === '') {
            $('#commentText').focus();
            return;
          }

          if (!isLoggedIn) {
            pendingComment = comment;
            $('#comment_modal').trigger('click');
            return;
          }

          postComment(comment, blogId);
        });

        $('#postAnonymouslyBtn').on('click', function () {
          let blogId = $('#blog_id').val();
          if (pendingComment) {
            $('#comment_modal').trigger('click'); // Close modal
            postComment(pendingComment, blogId);
            pendingComment = null;
          }
        });

        function postComment(comment, blogId) {
          let total_comments = parseInt($('#total_comments').val());

          $.ajax({
            url: $('#blog-comment').attr('action'),
            type: 'POST',
            data: {
              blog_id: blogId,
              comment: comment,
              _token: '{{ csrf_token() }}',
            },
            success: function (res) {
              if (res.status) {
                if (total_comments === 0) {
                  $('.comment_section').removeClass('d-none');
                  total_comments = 1;
                } else {
                  total_comments++;
                }
                $('#total_comments').val(total_comments);
                $('#comment_count').html(total_comments);
                $('.all-comments').prepend(res.comment);
                $('html').add('body').animate({
                  scrollTop: $('.comment_section').offset().top
                }, 100);
                setTimeout(() => {
                  $('.all-comments .highlight:first').removeClass('highlight');
                }, 1500);
                clearDraft(blogId);
                $('#blog-comment')[0].reset();
              }
            }
          });
        }
        

      })
    </script>
    <script>$(document).ready(function () {

    $('.admin-img').hover(function (e) {

        let bio = $(this).data('bio');
        if (!bio) bio = "No bio available";
let tooltip = $('<div class="bio-tooltip"></div>').html(bio);

        $('body').append(tooltip);

        let pos = $(this).offset();

        tooltip.css({
            top: pos.top + 40,
            left: pos.left
        }).fadeIn(150);

    }, function () {
        $('.bio-tooltip').remove();
    });

});</script>



@endsection
