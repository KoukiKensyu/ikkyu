@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <div class="card" style="width: 40rem;">
    <table border="1" class="table">
      <tr><th colspan="2">予約中の宿</th><th></th></tr>
      <tr><th>宿名</th><th>予約日</th><th>チェックイン</th><th>チェックアウト</th><th>金額</th></tr>
      <tr><td>{{$reservations[0]->name}}</td><td>{{$reservations[0]->reserved_date}}</td>
      <td>{{$reservations[0]->checkin_date}}</td><td>{{$reservations[0]->checkout_date}}</td>
      <td>{{$reservations[0]->price}}</td>
    </table>
      本当にキャンセルしますか
      <div class="d-flex justify-content-end text-right">
        <form action="{{route('mypage.reserve_cancel')}}" method="post">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{$reservations[0]->id}}">
        <button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark" name="submit">キャンセルする</button>
      </form>
      <button type="button" onclick="location.href='/mypage/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark" name="return">戻る</button>
    </div>
  </div>
</div>
@endsection