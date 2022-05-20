<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理者ログイン</title>
    <style>
        .center{
            text-align: center;
            border-style:solid;
            width:350px;
            margin:0 auto;
        }
        .table{
            text-align: right;

        }
        . button{
            text-align: center;
            display:inline-block;
            justify-content: center;
        }
    </style>
</head>
<body>
    @include('layouts.header')  
    <div  class="center">
    <h1>管理者ログイン</h1>
    <form action="" method="post">
        @csrf
        <table class="table">
        <tr>
            <th>管理者ID：</th>
            <td><input type="email" name="email" value="{{old('email')}}"></td>
        </tr>
        <tr>
            <th>パスワード：</th>
            <td><input type="password" name="password" value="" placefolder="8文字以上"></td>
        </tr>
        </table>
    </form>
        <p>
            <button>ログイン</button>
        </p>
    </div>
</body>
</html>    