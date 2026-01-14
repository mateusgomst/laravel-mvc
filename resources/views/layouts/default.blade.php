<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>
    @include('components.header')
    @include('components.nav')
    <main>
        @include('components.sidebar')

        <div id="content">
            @yield('content')
        </div>

    </main>

    @include('components.footer')

    <script src="{{ asset('node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('node_modules/@popperjs/core/dist/umd/popper-base.js') }}"></script>

</body>

</html>
