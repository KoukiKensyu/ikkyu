<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員ホーム</title>
    <style>/* CSSリセット */
* {
	margin: 0;
	padding: 0;
}

body {
	width: 800px;
	margin: 10px auto; /* 中央寄せ */
	display : flex; /* flexボックス */
	flex-wrap: wrap; /* flexアイテムを折り返す */
}

header {
	width:100%;
	height: 100px;
	background:#f0eeeb;
}

main {
	width: 550px;
	height: 300px;
	background:#e3e3e3;
}

aside {
	width: 250px;
	background:#c9c9c9;
}
.serch{
    display:flex;
}
</style>

</head>
<body>
<header>
<form action="" method="post">
		ヘッダー（横幅 800px）
</form>
	</header>
    <aside>
    <form action="" method="post">
		<p>タイプ検索</p>
        <input type="checkbox" name="hotel_type[]" id="type1" value="">
        <label for="type1">タイプ1</label><br>
        <input type="checkbox" name="hotel_type[]" id="type2" value="">
        <label for="type2">タイプ2</label><br>
        <input type="checkbox" name="hotel_type[]" id="type3" value="">
        <label for="type3">タイプ3</label><br>
</form>
	</aside>
	<main>
        <h1>会員ホーム</h1>
    <div class="serch">
        <form action=""></form>
		<p><input type="text" name="keyword" placeholder="検索キーワード"></p>
        <p><lebel>予約日<input type="date" name="day"></label></p>
        <p><input type="text" name="rooms" placeholder="部屋数"></p>
        <button type="submit">検索</button>
</form>
</div>



	</main>

</body>
</html>