@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2>会員退会確認</h2>
</div>

<div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
    <div class="card" style="width: 40rem;"> <!--tableをcard化--> 
    
<form action="{{route('destroy', $user->id)}}" method="post">
@csrf
@method('delete')

<!--未宿泊の予約があるかどうかでif-->
<table border="1" class="table">
<tr><th colspan="2">未宿泊の予約記録</th></tr>
<tr><th>宿名</th><th>予約日</th><th>宿泊日</th></tr>
<tr><td>東横イン</td><td>2022年4月20日</td><td>2022年5月20日</td></tr>
</table>
未宿泊の予定をキャンセルします<br>
<!-- endif-->
[ユーザーID:{{$user->id}}] [{{$user->name}}]を退会させますか？
<div class="d-flex justify-content-end">
<button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark">確定</button>
</form>
<button type="button" onclick="location.href='/admin/user_detail/{{ $user->id }}'" class="btn btn-outline-info" data-mdb-ripple-color="dark">＜戻る</button>
</div></div></div>

@endsection