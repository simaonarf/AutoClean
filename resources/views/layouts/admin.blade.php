<!DOCTYPE html>
<html>

@include('shared.head')

<body class="body-font container mx-auto bg-gray-900 px-5 text-gray-600">
    <x-admin.header />

    {{--     <h1 class="font-semibold text-gray-600">@yield('title')</h1> --}}

    @yield('content')
</body>

</html>
