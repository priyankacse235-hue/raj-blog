<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $site_data = App\Models\Genral_setting::first(); 
    ?>
    <link rel="shortcut icon" href="{{ url('storage/'.($site_data !== null ? $site_data->favicon : '')) }}" type="image/x-icon">
    <title>
        @isset($title)
            {{ Str::ucfirst($title) }}
        @endisset
        @isset($site_data)
            {{ ($title !== null ? ' | ' : ''). Str::title($site_data->site_name) }}
        @endisset
    </title>
    @include('master/layout/css')
    <style>
        .custom_logo_image{
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('master/layout/header')
        @include('master/layout/sidebar')
        @yield('content')
        @include('master/layout/footer')
    </div>
        @include('master/layout/js')
        @yield('js_content')
</body>
</html>