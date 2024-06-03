<!-- test_methods.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Methods</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('games.index') }}">Index</a></li>
            <li><a href="{{ route('games.create') }}">Create</a></li>
        </ul>
    </nav>

    <div>
        @yield('content')
    </div>
</body>
</html>

@yield('scripts')
