<!--file: resources/views/html101.blade.php -->
<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <title>Workshop #HTML - FORM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { font-family: system-ui, -apple-system, "Segoe UI", Tahoma, sans-serif; background:#f7f7f7; margin:0; }
    .container { max-width: 720px; margin: 40px auto; background:#fff; padding: 24px; border-radius:12px; box-shadow: 0 6px 24px rgba(0,0,0,0.08); }
    h1 { font-size: 22px; margin: 0 0 20px; }
    form { display: grid; gap: 16px; }
    .field { display: grid; gap: 8px; }
    label { font-weight: 600; }
    input[type="text"],
    input[type="number"],
    input[type="date"],
    select,
    textarea {
      padding: 10px 12px;
      border: 1px solid #d0d7de;
      border-radius: 8px;
      font-size: 14px;
    }
    textarea { min-height: 100px; resize: vertical; }
    .inline-group { display: flex; gap: 16px; align-items: center; flex-wrap: wrap; }
    .actions { display: flex; gap: 12px; }
    button, input[type="submit"], input[type="reset"] {
      padding: 10px 16px; border: 1px solid #1f6feb; background:#1f6feb; color:#fff;
      border-radius: 8px; font-weight: 600; cursor: pointer;
    }
    input[type="reset"] { background: #f6f8fa; color: #24292f; border-color: #d0d7de; }
  </style>
  @stack('styles')
</head>
<body>
  <div class="container">
    <h1>Flie Default</h1>
    @yield('content')
  </div>
  @stack('scripts')
</body>
</html>
