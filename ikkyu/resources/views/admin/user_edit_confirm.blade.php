@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2>会員情報変更確認</h2>
</div>

<form action="{{route('admin.user_update', $user->id)}}" method="POST">
    @method('patch')
    @csrf

<div class="d-flex justify-content-center"> <!--tableをセンターに表示-->
<div class="card" style="width: 40rem;"> <!--tableをcard化--> 

<table border="1" class="table">
<tr><th colspan="2"  class="table-dark">会員情報</th></tr>
<tr><th>会員ID</th><td>{{$user->id}}</td></tr>
<tr><th>氏名</th><td>{{$user->name}}</td></tr>
<tr><th>住所</th><td>{{$user->address}}</td></tr>
<tr><th>電話番号</th><td>{{$user->tel}}</td></tr>
<tr><th>メールアドレス</th><td>{{$user->email}}</td></tr>
<tr><th>生年月日</th><td>{{$user->birthday}}</td></tr>
</table>
<input type="hidden" name="name" value="{{$user->name}}">
<input type="hidden" name="address" value="{{$user->address}}">
<input type="hidden" name="tel" value="{{$user->tel}}">
<input type="hidden" name="email" value="{{$user->email}}">
<input type="hidden" name="birthday" value="{{$user->birthday}}">

<p><strong>この内容で確定しますか？</strong></p> <!--太字-->
<div class="d-flex justify-content-end">
<button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark">変更確定</button>
</form>
<button onclick="location.href='/admin/user_edit/{{ $user->id }}'" class="btn btn-outline-info" data-mdb-ripple-color="dark">戻る</button>
</div>
</div></div>
@endsection