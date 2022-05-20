<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/app.js')}}" defer></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>ひとやすみ</title>
    <style>
        header.brand{
            display: block;
            font-size: 1.3rem;
        }
        button{
            color: red;
            position: -ms-page;
        }
        .width{
            display:flex;/*横に並べる*/
        }
        .height{
            display:inline;/*縦に並べる*/
        }
        header .brand{
    display: block;
    font-size: 1.3rem;
}
.navigation li{
    padding: 0 10px;
}
button{
    color: red;
    position: -ms-page;
}
table.AdminMem{
    border-collapse: collapse;
}

.width{
    display:flex;/*横に並べる*/
}
.height{
    display:inline;/*縦に並べる*/
}
    </style>
</head>
<body>
    <header>
        <div class="container">
            <a class="bland" href="/">ひとやすみ</a>
        @include('commons/nav')
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>