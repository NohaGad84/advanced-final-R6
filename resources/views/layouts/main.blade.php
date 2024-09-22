<!doctype html>
<html lang="en">
@include('public.public_includes.head')
    
    <body class="topics-listing-page" id="top">

        <main>

        @include('public.public_includes.navbar')

        @include('public.public_includes.header')


        @yield('content')
       

        </main>

        @include('public.public_includes.footer')

        @include('public.public_includes.js')

    </body>
</html>