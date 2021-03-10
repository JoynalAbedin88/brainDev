@include('backend.layouts.header')
@include('backend.layouts.leftbar')

<main class="app-content">
    @yield('content')
</main>

@include('backend.layouts.footer')