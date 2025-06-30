<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Website</title>
    <link rel="stylesheet"  href="{{ asset('css/layout.css')}}">
    @yield('style')
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">NoteApp</a>
            </div>
            <ul class="nav-links">
                <li><a href="{{route('notes.index')}}">Notes</a></li>
                @guest
                    <li><a href="{{route('auth.loginForm')}}">login</a></li>
                    <li><a href="{{route('auth.signupForm')}}">sign up</a></li>                    
                @endguest
                @auth
                    <li><a href="{{route('auth.logout')}}">logout</a></li>   
                @endauth
            </ul>
        </nav>
    </header>
    {{-- <h1>Layout Loaded</h1> --}}
    @yield('main')
</body>
</html>
