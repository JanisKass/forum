<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Movie Forum</title>

   
<link rel="stylesheet" href="{{ asset('css/pure-min.css') }}">
<link rel="stylesheet" href="{{ asset('css/skin.css') }}">
<link rel="stylesheet" href="{{ asset('css/more.css') }}">
<link rel="stylesheet" href="{{ asset('css/foundation.css') }}">

<script src="{{ asset('js/ui.js') }}"></script>
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{{asset ('css/side-menu-old-ie.css') }}">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{{ asset('css/side-menu.css') }}">
    <!--<![endif]-->
 
</head>
<body class="pure-skin-mine">

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="/threads">Forum</a>

            <ul>
                <li><a href="/threads">Threads</a></li>
                <li>
                    <a href="/threads/search">Search</a>
            </li>
         @if ( Auth::guest() )
            <li><a href="/user/login">Login</a></li>
            <li><a href="/user/register">Register</a></li>
         @else
            @if ( Auth::user()->isAdmin() )
                <li><a href="/admin">Admin</a></li>
            @endif
            <li><a href="/user">{{{Auth::user()->username }}}</a></li>
            <li><a href="/user/logout">Logout</a></li>
         @endif
            </ul>
        </div>
    </div>
<!--==============================Content=================================-->
    <div id="main" class="content pure-g">
        
        <div class="pure-u-1">
        @if ( $message = Session::pull('message') )
            <p class="success_msg">{{{ $message }}}</p>
        @endif
        <div class="content pure-u-1">
        @yield('content')
        </div>
  </div>
  
</div>

<script src="js/ui.js"></script>


</body>
</html>
