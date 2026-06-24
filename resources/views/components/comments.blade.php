<div class="media mb-4 single-comment {{ isset($is_highlight) ? 'highlight' : '' }}">
    <img class="mr-3 rounded-circle comment_image" src="{{ $comment->profile ? 'storage/'.$comment->profile : url('images/user.png') }}" alt="User Avatar">
    <div class="media-body">
        <h6 class="mt-0">{{ \Illuminate\Support\Str::ucfirst($comment->user_name ?? 'Guest') }} <small class="text-muted">• {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small></h6>
        {{ $comment->comment }}
    </div>
</div>