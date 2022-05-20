@extends('layouts.app')

@section('content')

<!--未宿泊の予約があるかどうかでif-->
<table border="1">
<tr><th colspan="2">未宿泊の予約記録</th></tr>
<tr><th>宿名</th><th>予約日</th><th>宿泊日</th></tr>
<tr><td>東横イン</td><td>2022年4月20日</td><td>2022年5月20日</td></tr>
</table>
未宿泊の予定をキャンセルします<br>
<!-- endif-->
[012345678][氏名]を退会させますか？

<button onclick="location.href='/home/index'">確定</button>
<button onclick="location.href='/admin/UserIndex'">＜戻る</button>

@endsection