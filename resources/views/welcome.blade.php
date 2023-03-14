<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('style.css')}}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".alert").delay(5000).slideUp(300);
        });
    </script>
</head>

<body class="antialiased">

    <div class="main">
        @if(session()->has('message'))
        <div class="alert alert-success" style="color:white !important">
            {{ session()->get('message') }}
        </div>
        @elseif(session()->has('danger'))
        <div class="alert alert-danger" style="color:white !important">
            {{ session()->get('danger') }}
        </div>
        @endif
        @if($errors->any())
        <p class="section-title bg-warning rounded px-2">{{$errors->first()}}</p>
        @endif
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="{{route('register')}}" method="post">
                @csrf
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="name" placeholder="User name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="pass" placeholder="Password">
                <button>Sign up</button>
            </form>
        </div>

        <div class="login">
            <form action="{{route('login')}}" method="post">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>
    </div>
</body>

</html>