<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Engagement Invitation</title>
  @include('user/layout/css')
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    {!! $temp->css !!}
  </style>
</head>
<body>
  {!! $temp->html !!}

  <footer class="text-center bg-primary">
    <p class="mb-0">&copy; 2025 Developed By Rk Creation | Raj blogs</p>
  </footer>

  @include('user.layout.js')
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>
