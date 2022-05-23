@extends('layouts.app')

@section('content')
<form action="{{route('destroy', $user->id)}}" method="post">
@csrf
@method('delete')

<!--未宿泊の予約があるかどうかでif-->
<!-- <table border="1">
<tr><th colspan="2">未宿泊の予約記録</th></tr>
<tr><th>宿名</th><th>予約日</th><th>宿泊日</th></tr>
<tr><td>東横イン</td><td>2022年4月20日</td><td>2022年5月20日</td></tr>
</table>
未宿泊の予定をキャンセルします<br> -->
<!-- endif-->
[{{$user->id}}][{{$user->name}}]を退会させますか？

<button type="submit">確定</button>
</form>
<button onclick="location.href='/admin/UserIndex'">＜戻る</button>

@endsection