<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ひとやすみ</title>
    <style>
        header .container{
    display: flex;
    justify-content: space-between;
    
}
        .navigation{
            display: flex;
   
    margin: 0;
    padding: 0;
    list-style: none;
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