@extends('layouts.app')

@section('content')
<h2>登録が完了しました</h2>

<button onclick="location.href='/hotel_views/create'" class="btn btn-outline-danger" data-mdb-ripple-color="dark">続けて登録</button>
<button onclick="location.href='/hotel_views/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark"">一覧へ</button>
@endsection