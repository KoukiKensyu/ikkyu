@extends('layouts.app')

@section('content')
<!-- Jumbotron -->

<div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white"
  style="background-image: url('/images/beach_background.jpg');">
  <h1 class="mb-3 h2">会員情報</h1>
<p></p>
</div>

<!-- 会員情報タブ -->
<div>
<ul class="nav nav-pills mb-3 px-5" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button
      class="nav-link active"
      id="pills-home-tab"
      data-bs-toggle="pill"
      data-bs-target="#pills-home"
      type="button"
      role="tab"
      aria-controls="pills-home"
      aria-selected="true"
    >
      会員情報
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button
      class="nav-link"
      id="pills-profile-tab"
      data-bs-toggle="pill"
      data-bs-target="#pills-reserve"
      type="button"
      role="tab"
      aria-controls="pills-reserve"
      aria-selected="false"
    >
      予約中
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button
      class="nav-link"
      id="pills-profile-tab"
      data-bs-toggle="pill"
      data-bs-target="#pills-profile"
      type="button"
      role="tab"
      aria-controls="pills-profile"
      aria-selected="false"
    >
      パスワード変更
    </button>
  </li>
</ul>
</div>

<div class="tab-content" id="pills-tabContent">
  <div
    class="tab-pane fade show active"
    id="pills-home"
    role="tabpanel"
    aria-labelledby="pills-home-tab"
  >
      <div class="d-flex justify-content-center">
        <div class="card" style="width: 40rem;">

          <table border="1" class="table">
          <tr><th colspan="2">会員情報</th></tr>
          <tr><th>会員ID</th><td>{{$users->id}}</td></tr>
          <tr><th>氏名</th><td>{{$users->name}}</td></tr>
          <tr><th>住所</th><td>{{$users->address}}</td></tr>
          <tr><th>電話番号</th><td>{{$users->tel}}</td></tr>
          <tr><th>メールアドレス</th><td>{{$users->email}}</td></tr>
          <tr><th>生年月日</th><td>{{$users->birthday}}</td></tr>
          </table>
          <div class="text-right">
            <button onclick="location.href='/mypage/edit'" class="btn btn-outline-danger" data-mdb-ripple-color="dark">変更</button>
            <button onclick="location.href='/mypage/UserDelete'" class="btn btn-danger btn-rounded">退会</button>
            <button onclick="location.href='/user_home/index'" class="btn btn-outline-info" data-mdb-ripple-color="dark" >会員ホームへ</button>
          </div>
        </div>
        </div>
  </div>

<!-- 予約中タブ -->
<div
    class="tab-pane fade"
    id="pills-reserve"
    role="tabpanel"
    aria-labelledby="pills-profile-tab"
  >
  <div class="d-flex justify-content-center">
    <div class="card" style="width: 40rem;">
      <table border="1" class="table">
        <tr><th colspan="2">予約中の宿</th><th></th></tr>
        <tr><th>宿名</th><th>予約日</th><th>チェックイン</th><th>チェックアウト</th></tr>
        @foreach($reservations as $reserve)
        <tr><td>{{$reserve->name}}</td><td>{{$reserve->reserved_date}}</td><td>{{$reserve->checkin_date}}</td><td>{{$reserve->checkout_date}}</td>
        <td><a href="cancel/{{$reserve->id}}" class="text-primary">キャンセル</a></td></tr>
        @endforeach
      </table>
    </div>
  </div>
</div>

<!-- パスワード変更タブ -->
  <div
    class="tab-pane fade"
    id="pills-profile"
    role="tabpanel"
    aria-labelledby="pills-profile-tab"
  >
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header">会員パスワード変更</div>
        
                      <div class="card-body">
                          <form method="POST" action="{{ route('change.password') }}">
                              @csrf 
        
                              @foreach ($errors->all() as $error)
                                  <p class="text-danger">{{ $error }}</p>
                              @endforeach 
        
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">現在のパスワード</label>
        
                                  <div class="col-md-6">
                                      <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password" pattern=".{8,}" required title="a">
                                  </div>
                              </div>
        
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">新しいパスワード</label>
        
                                  <div class="col-md-6">
                                      <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" required>
                                  </div>
                              </div>
        
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">パスワードの確認入力</label>
          
                                  <div class="col-md-6">
                                      <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password" required>
                                  </div>
                              </div>
        
                              <div class="form-group row mb-0">
                                  <div class="col-md-8 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          パスワードを変更する
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection