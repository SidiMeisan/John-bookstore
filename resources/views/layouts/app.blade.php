<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>
    <!-- Add your CSS styles, scripts, and other head content here -->
    @yield('js')
</head>
<body>
    <div id="app">
        <!-- Add your navigation bar or header content here -->

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Add your footer or additional content here -->
    </div>

    <!-- Add your JavaScript scripts and other scripts here -->
</body>
</html>