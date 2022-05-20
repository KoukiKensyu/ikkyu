<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <style>
        .all{
            text-align: center;
            border-style:solid;
            width:350px;
            margin:0 auto;
        }
        .table{
            text-align: right;

        }
    </style>
</head>
<body>
    @include('layouts.header') 
    <div  class="all">
    <h1>ログイン</h1>
    <form action="" method="get">
        @csrf
        <table class="table">
        <tr>
            <th>メールアドレス：</th>
            <td><input type="email" name="email" value="{{old('email')}}"></td>
        </tr>
        <tr>
            <th>パスワード：</th>
            <td><input type="password" name="password" value="" placefolder="8文字以上"></td>
        </tr>
    </table>
    </form>
        <p>
            <button onclick="location.href='/'">ログイン</button>
        </p>
        <p>または</p>
        <p>
            <button onclick="location.href='/register_input'">新規登録</button>
        </p>
</div>
</body>
</html>