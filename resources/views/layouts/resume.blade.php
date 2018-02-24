<!DOCTYPE html>
<html lang="en" class="htmlmin">
    <head>
        <title>resume maker - @yield('title') </title>
        @include('includes.head')

    </head>

<body id="page-top">

    @include('includes.nav')

    <div class="container-fluid p-0">
        @yield('content')
    </div>

    @include('includes.foot')

</body>

</html>