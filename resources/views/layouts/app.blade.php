<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ Vite::asset('resources/js/app.js') }}" type="module"></script>
    @vite('resources/css/app.scss')

    @yield('styles')
</head>
<body>
<header>
    @include('components.header')
</header>

<main role="main" class="container mt-4">
    @yield('content')

</main>

<footer>

    @include('components.footer')
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            toastr.success('@lang('toastr.'.session('success'))');
        @elseif (session('error'))
            toastr.warning('@lang('toastr.'.session('error'))');
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            toastr.error('@lang('toastr.'.$error)');
            @endforeach
        @endif
    })
</script>

@yield('scripts')
</body>
</html>
