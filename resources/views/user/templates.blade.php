
@extends('user.layout')
@section('title', 'Terms and Conditions')
@section('content')
<style>
    .skeleton-img {
        height: 180px;
        background-color: #000000bb;
        /* background: linear-gradient(90deg, #f15a24); */
        /* background: linear-gradient(90deg, #2a2a2a 25%, #3a3a3a 50%, #2a2a2a 75%); */
        border-radius: 6px;
        animation: pulse 1.5s infinite ease-in-out;
    }

    .skeleton-text {
        height: 14px;
        background-color: #000000bb;
        border-radius: 4px;
        animation: pulse 1.5s infinite ease-in-out;
    }

    .skeleton-heading {
        height: 40px;
        width: 1020ox;
        background-color: #000000bb;
        border-radius: 8px;
        animation: pulse 1.5s infinite ease-in-out;
    }

    .skeleton-button {
        height: 32px;
        background-color: #000000bb;
        border-radius: 25px;
        animation: pulse 1.5s infinite ease-in-out;
    }

    @keyframes pulse {
        0% { opacity: 0.2; }
        50% { opacity: 0.4; }
        100% { opacity: 0.2; }
    }
</style>
<div class="container my-5">
    <div id="template-content">
        <div class="row">
            <h1 class="text-center mb-4">Choose & Customize Any Template in Seconds</h1>
          
            <!-- Tabs -->
            <div class="col-12 text-center">
                <div class="d-flex justify-content-center align-items-center py-3">
                    <ul class="nav nav-pills" id="categoryTabs" role="tablist">
                        @foreach ($categories as $category_key =>  $category_item)
                            <li class="nav-item">
                                <a class="nav-link {{ $category_key == 0 ? 'active' : '' }}" id="cat-tab-{{ $category_item->id }}" data-toggle="tab" href="#cat-{{ $category_item->id }}" role="tab">
                                    <strong>{{ $category_item->name }}</strong> 
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
          
            <!-- Templates Grid -->
            <div class="col-12">
                <div class="tab-content" id="categoryTabsContent">
                    @foreach ($categories as $cat_key => $category_it)
                        <div class="tab-pane fade {{ $cat_key == 0 ? 'show active' : '' }} " id="cat-{{ $category_it->id }}" role="tabpanel">
                            <p> 
                                <strong>{{ $category_it->name }} Templates</strong>
                            </p>
                            <div class="row">
                                @foreach ($temps as $temp)
                                    <div class="col-md-3 mb-4">
                                        <div class="card h-100 shadow-sm">
                                            <img src="{{url('storage/'.$temp->thumbnail)}}" class="card-img-top" alt="Poster">
                                            <div class="card-body text-center">
                                            <h6 class="card-title">{{ $temp->title }}</h6>
                                            {{-- <a href="#" class="btn btn-primary btn-sm">Try It</a> --}}
                                            <a href="{{ url(make_template_url($temp->id)) }}"
   target="_blank"
   class="btn btn-primary btn-sm">
   Try It
</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function showSkeletonLoaders(count) {
        const $container = $('#skeleton-loader');
        $container.empty(); // Clear previous loaders if needed

        // Add text before skeleton items
        const headerText = ``;
        $container.append(headerText);

        // Skeleton HTML block
        const skeletonHTML = `
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card p-2 shadow-sm">
                    <div class="skeleton-img mb-3"></div>
                    <div class="skeleton-text mb-2 w-75"></div>
                    <div class="skeleton-button w-50"></div>
                </div>
            </div>
        `;

        for (let i = 0; i < count; i++) {
            $container.append(skeletonHTML);
        }
    }

    // Example: create 8 skeleton blocks
    function showLoader() {
        $('#skeleton-loader').removeClass('d-none');
        $('#template-content').addClass('d-none');
    }

    function hideLoader() {
        $('#skeleton-loader').addClass('d-none');
        $('#template-content').removeClass('d-none');
    }
    $(document).ready(function() {
        // showSkeletonLoaders(8);
        // $.ajax({
        //     url: '{{ url("admin/template_load_more") }}',
        //     type: 'POST',
        //     data: {
        //         page: page,
        //         _token : '{{ csrf_token() }}',
        //     },
        //     success: function(data) {
        //         if(data != ''){
        //             $('#content').append(data);
        //             page++;
        //             $('#page').val(page)
        //             loading = true;
        //         }else{
        //             loading = false;
        //             $('#loader').toggleClass('d-none')
        //         }
        //     }, error: function() {
        //         console.log("Error loading data");
        //         loading = true;
        //         $('#loader').hide(); // Hide the loader in case of an error
        //     }
        // });
        // Show on first load
        // showLoader();
        // setTimeout(() => {
        //     hideLoader(); // simulate template load
        // }, 1200);

        // // On tab click
        // $('.nav-link').on('click', function() {
        //     showLoader();

        //     // Simulate loading templates
        //     setTimeout(() => {
        //     hideLoader();
        //     }, 1200); // change based on your AJAX speed
        // });
    });
</script>
@endsection
