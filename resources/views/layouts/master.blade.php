<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    <title>Patroli - @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- page css -->
    @stack('style')
    <!-- Core css -->
    @include('includes.style')
</head>
<body>
    <div class="app">
        <div class="layout">
            {{-- Header Start --}}
            @include('parts.header')


            {{-- Side Nav --}}
            @include('parts.sidebar')


            {{-- Page Container --}}
            <div class="page-container">
                <div class="main-content">
                    @yield('content')
                </div>
                {{-- Footer --}}
                 @include('parts.footer')
            </div>



        </div>
    </div>


    <!-- Core Vendors JS -->
    @include('includes.vendor')

    <!-- page js -->
    @stack('script')

    <!-- Core JS -->
    @include('includes.script')
</body>
</html>
