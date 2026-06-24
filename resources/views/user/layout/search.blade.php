



@extends('user.layout')

@section('title', 'Search Results')

@section('content')

<section class="bread-container wow fadeInUp">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0 mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Search Results</li>
            </ol>
        </nav>
    </div>
</section>

<section class="blog-list pb-4">

    <div class="bloglist-section mt-4">
        <div class="container">
            <div class="row">

                @if($blogs->count() > 0)

                    @foreach ($blogs as $item)

                        <div class="col-md-6 col-lg-6">
                            <div class="card blog-box-sty border-0 shadow mb-4">

                                <div class="blog__img">
                                    <a href="{{ make_blog_url($item->id) }}">
                                        <img src="{{ url('storage/'.$item->image) }}" class="w-100" />
                                    </a>
                                </div>

                                <div class="card-body">

                                    <ul class="d-flex flex-wrap list-unstyled cat-name mb-0">
                                        <li class="blog__cat">{{ $item->catgeory }}</li>
                                    </ul>

                                    <h4>
                                        <a href="{{ make_blog_url($item->id) }}">
                                            {!! $item->short_desc !!}
                                        </a>
                                    </h4>

                                    <div class="d-flex justify-content-between mt-3">
                                        <div class="blog-writtenby">
                                            <strong>By</strong> {{ $item->writter }}
                                        </div>

                                        <div class="blog-date">
                                            <i class="icon-calendar icons"></i>
                                            {{ date('M d, Y', strtotime($item->created_at)) }}
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    @endforeach

                @else

                    <div class="col-12">
                        <div class="alert alert-warning">
                            No blogs found for your search.
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>

</section>

@endsection