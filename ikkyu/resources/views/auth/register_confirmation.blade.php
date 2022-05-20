<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
	<title>登録内容確認</title>
  <style>
    .all{
        text-align: center;
        border-style:solid;
        width:400px;
        margin:0 auto;
    }
    .table{
        text-align: right;
    
    }
    .button{
        display: flex;
        justify-content: space-evenly;
        }
</style>
</head>
<body>
  @include('layouts.header') 
  <div  class="all">
      <h1>登録内容確認</h1>
      <table class="table">
        <tr><th>氏名：</th><td>---</td></tr>
        <tr><th>住所：</th><td>---</td></tr>
        <tr><th>電話番号：</th><td>---</td></tr>
        <tr><th>メールアドレス：</th><td>---</td></tr>
        <tr><th>生年月日：</th><td>---</td></tr>
        <tr><th>パスワード：</th><td>---</td></tr>
      </table>
      <p>登録内容を確認後[登録]ボタンを押してください</p>
    <div class="button">
      <p>
        <button onclick="location.href='/'">登録</button>
      </p>
      <p>
      <button onclick="location.href='/register_input'">＜戻る</button>
      </p>
    </div>
  </div>
</body>
</html>
