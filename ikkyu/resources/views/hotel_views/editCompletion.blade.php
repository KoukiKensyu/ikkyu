@extends('layouts.app')

@section('content')
<h2>変更が完了しました</h2>

<button onclick="location.href='/hotel_views/edit/{{ $hotel->id }}'" class="btn btn-outline-info" data-mdb-ripple-color="dark">戻る</button>
<button onclick="location.href='/hotel_views/index'" class="btn btn-danger btn-rounded">一覧へ</button>
@endsection