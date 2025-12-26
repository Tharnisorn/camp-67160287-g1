<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Workshop')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- สำคัญ: ป้องกัน 419 -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
    body { font-family: system-ui, -apple-system, "Segoe UI", Tahoma, sans-serif; background:#f7f7f7; margin:0; }
    .container { max-width: 720px; margin: 40px auto; background:#fff; padding: 24px; border-radius:12px; box-shadow: 0 6px 24px rgba(0,0,0,0.08); }
    h1 { font-size: 22px; margin: 0 0 20px; }
  </style>

  @stack('styles')
</head>
<body>
  <div class="container">
    @yield('content')
  </div>

  @stack('scripts')
</body>
</html>
