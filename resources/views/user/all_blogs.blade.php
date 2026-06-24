@extends('user.layout')
@section('title', 'Blogs')
@section('content')
    <section class="bread-container wow fadeInUp">
        <div class="container">
            <nav aria-label="breadcrumb">
 

  <ol class="breadcrumb pl-0 mb-0 d-flex w-100 justify-content-between align-items-center">

    <div class="d-flex align-items-center">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Home</a>
        </li>

        <li class="breadcrumb-item active" aria-current="page">
            Blog
        </li>
    </div>

    <li class="d-flex">
        <form action="{{ url('search') }}" method="GET"
              class="position-relative" style="width: 400px;">

            <div class="input-group">
                <input type="text" id="search-box" name="q"
                       class="form-control form-control-lg" placeholder="Search blogs...">
                <button type="submit" class="btn btn-light">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            
            <div id="search-results" 
     class="position-absolute w-100 bg-white shadow "
     style="top:100%; left:0; z-index:9999; max-height:300px; overflow-y:auto;">
     
</div>


        </form>
    </li>

</ol>
                
              
            </nav>
         </div>
    </section>

    <section class="blog-list pb-4">
        {{-- <section class="blog-list pb-4 position-relative" style="z-index:1;"> --}}
      

        <div class="bloglist-section mt-4">
            <div class="container">
                <div class="row">
                    @isset($blogs)
                        @foreach ($blogs as $key => $item)
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
                                        <h4><a href="blog-details.html">{!! $item->short_desc !!}</a>
                                        </h4>
                                        <div class="d-flex justify-content-between mt-3">
                                            <div class="blog-writtenby"><strong>By</strong> {{ $item->writter }}</div>
                                            <div class="blog-date"><i class="icon-calendar icons"></i> {{ date('M d, Y',strtotime($item->created_at)) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-6 col-lg-6">
                            <div class="card blog-box-sty border-0 shadow mb-4">
                                <h4>Blog Not Found</h4>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </section>
@endsection


<script>
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('search-box').addEventListener('keyup', function () {

        let q = this.value;

        if (q.length < 2) {
            document.getElementById('search-results').innerHTML = '';
            return;
        }

        fetch('/search-suggestions?q=' + encodeURIComponent(q))
            .then(response => response.json())
            .then(data => {

                let html = '<ul class="list-group">';

                data.forEach(item => {
                    // html += `<li class="list-group-item">
                    //             <a href="/search?q=${encodeURIComponent(item.title)}">
                    //                 ${item.title}
                    //             </a>
                    //          </li>`;
                    html += `<li class="list-group-item">
            <a href="/search?q=${encodeURIComponent(item.title)}"
               class="d-block text-truncate w-100">
                ${item.title}
            </a>
         </li>`;
                });

                 html += '</ul>';

                 document.getElementById('search-results').innerHTML = html;
               
            });
    });

});
</script>
<script>
    document.addEventListener('click', function (e) {

    let searchBox = document.getElementById('search-box');
    let results = document.getElementById('search-results');

    // agar click search box ya results ke bahar hua
    if (!searchBox.contains(e.target) && !results.contains(e.target)) {
        searchBox.value = '';
        results.innerHTML = '';
    }

});
</script>