<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>会員登録</title>
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
    <h1>会員登録</h1>
    <form action="" method="post">
        @csrf
        <table class="table">
            <tr>
                <th>氏名：</th>
                <td><input type="text" name="name" value="{{old('name')}}"></td>
            </tr>
            <tr>
                <th>住所：</th>
                <td><input type="text" name="address" value="{{old('address')}}"></td>
            </tr>
            <tr>
                <th>電話番号：</th>
                <td><input type="tel" name="tel" value="{{old('tel')}}"></td>
            </tr>
            <tr>
                <th>メールアドレス：</th>
                <td><input type="email" name="email" value="{{old('email')}}"></td>
            </tr>
            <tr>
                <th>生年月日：</th>
                <td> <input type="date" name="birthday" value="{{old('birthday')}}"></td>
            </tr>
            <tr>
                <th>パスワード：</th>
                <td><input type="password" name="password" value="" placeholder="8文字以上"></td>
            </tr>
            <tr>
                <th>パスワード(確認用)：</th>
                <td><input type="password" name="password_confirmation" value="" class="textbox"></td>
            </tr>
        </table>
    </form>
        <p>
            <button onclick="location.href='/register_confirmation'">確認画面へ</button>
        </p>
        <p>または</p>
        <p>
            <button onclick="location.href='/login_user'">ログイン</button>
        </p>
    </div>
</body>
</html>
