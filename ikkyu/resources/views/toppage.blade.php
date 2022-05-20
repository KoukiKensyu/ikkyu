@extends('layouts.app')

@section('content')
  <!-- Background image -->
  <style>
    body  {
      background-image: url("/images/beach_background.jpg");
      background-color: #cccccc;
      background-size: cover;
    }
    h1{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      margin: 0;
      font-size: 150px;
    }
  </style>
  <div>
    <div class="fs-1 text-center">
      <div class="text-white">
        <h1>ひとやすみ</h1>
      </div>
    </div>
  </div>
  <!-- Background image -->
  @endsection