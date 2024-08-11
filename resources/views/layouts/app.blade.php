<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ Vite::asset('resources/js/app.js') }}" type="module"></script>
    @yield('styles')
</head>
<body>
<header>
    @include('components.header')  <!-- Header section -->
</header>

<main role="main" class="container mt-4">
    @yield('content')  <!-- Main content section -->
</main>

<footer>
    @include('components.footer')  <!-- Footer section -->
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            toastr.success('{{session('success')}}');
        @elseif (session('error'))
            toastr.warning('{{session('errpr')}}');
        @endif
    })
</script>x

@yield('scripts')
</body>
</html>
