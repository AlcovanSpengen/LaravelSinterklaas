<!doctype html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>

    <body>
    <header>
    </header>
        @include('partials._nav')

        <div class="container">
            @yield('content')            
        </div> 
        
        @include('partials._footer')
        @include('partials._javascript')
        @yield('scripts')
    </body>
    
</html>