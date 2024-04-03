<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href=@yield('css')>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/script.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 left-side">
            <div class="mt-3 mb-5 text-center">
                <h1 class="fs-3">To-Do List KCR</h1>
            </div>

            <ul>
                <div><li><i class="fa fa-user"></i><a href="/profile">Profile</a></li></div>
                <div><li><i class="fa fa-home"></i><a href="/">Dashboard</a></li></div>
                <div><li><i class="fa fa-sign-out"></i><a href="/logout">Logout</a></li></div>
            </ul>
        </div>

        <div class="col-md-10 main-side">
            @yield('content')
        </div>
    </div>
</div>


</body>
</html>
