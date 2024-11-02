<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('/vendor/css/bootstrap.min.css') }}" rel="stylesheet">

  <title>@yield('title')</title>
</head>

<body>
  <x-navbar />

  @yield('main')

  <script src="{{ asset('/vendor/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
