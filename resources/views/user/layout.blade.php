<!doctype html>
<html> 
<head>
  <meta charset=utf-8>
  <html lang=en-in dir=ltr>
  <meta http-equiv=X-UA-Compatible content="IE=edge">
  @isset($blog)
    {{-- show title & image where share blog  --}}
    <title>{{ $blog->title }}</title>

    <meta property="og:title" content="{{ $blog->title }}" />
    <meta property="og:description" content="{{ $blog->short_desc }}" />
    <meta property="og:image" content="{{ url('storage/'.$blog->image) }}" />
    <meta property="og:url" content="{{ make_blog_url($blog->id) }}" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog->meta_desc), 160) }}">
    <meta property="og:url" content="{{ make_blog_url($blog->id) }}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ url('storage/'.$blog->image) }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($blog->meta_desc), 160) }}">
    <meta name="twitter:image" content="{{ url('storage/'.$blog->image) }}">

    <link rel="canonical" href="{{ make_blog_url($blog->id) }}" />
    <style>
      
    </style>
    @if (Request::is('/'))
      <!-- JSON-LD for Organization -->
      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Raj Blogs || Rk Creation",
        "url": "https://rkraj.in",
        "logo": "https://rkraj.in/storage/sites/1749091595_mini_logo-black.png",
      }
      </script>

      <!-- JSON-LD for Website -->
      <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "https://rkraj.in/",
        "potentialAction": {
          "@type": "SearchAction",
          "target": "https://rkraj.in/search?q={search_term_string}",
          "query-input": "required name=search_term_string"
        }
      }
      </script> 
    @endif

  @endisset
  <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
  @isset($blog)
    <meta property="og:type" content="article" />
  @else
    <meta property="og:type" content="website" />
  @endisset
  <?php
    $site_data = App\Models\Genral_setting::first();
  ?>
  <link rel="shortcut icon" href="{{ url('storage/'.($site_data !== null ? $site_data->favicon : '')) }}" type="image/x-icon">
  <title>
    @yield('title')
    @isset($site_data)
      {{ $site_data->site_name == null ? '' : ' | '.Str::title($site_data->site_name) }}
    @endisset
  </title>
  
  @include('user/layout/css')
  <style>
    .custom_logo_image{
      width: 80px;
      height: 80px;
      position: absolute;
      top: -20px;
      left: -20px;
      padding: 0px !important;
    }
    .navbar-nav .nav-link {
      font-size: 14px; /* smaller text */
      padding: 6px 12px; /* controlled padding to avoid shifting */
      border: 2px solid transparent; /* prevent layout shift on hover */
      border-radius: 10px;
      transition: all 0.3s ease;
  }

  .navbar-nav .nav-link:hover {
      border-color: red;
      background-color: rgba(255, 0, 0, 0.05); /* optional soft red background */
  }

  .navbar-nav .nav-link.nav-active {
      border-color: var(--bs-primary); /* active state: primary border */
      font-weight: 500;
  }
    /* .navbar-nav .nav-link.active {
        font-weight: bold;
        color: #007bff; /* Your highlight color */
        border-bottom: 2px solid transparent;
        transition: border-color 0.3s ease;
        border-bottom: 2px solid var(--bg-primary);
    }
    .navbar-nav .nav-link:hover {
        border-bottom: 2px solid var(--bg-primary);
    } */
  </style>
</head>
<body>
    @include('user.layout.header')
    @if(Auth::check())
      <input type="hidden" name="is_logged_in" value="1">
      <input type="hidden" name="auth_id" value="{{ Auth::id() }}">
    @else
      <input type="hidden" name="is_logged_in" value="0">
      <input type="hidden" name="auth_id" value="">
    @endif
    @yield('content')
  
    @include('user.layout.footer')
    @include('user.layout.js')
    @yield('js')
</body>
</html>