@extends('layouts.app2')

@section('content')
  <!-- Background image -->
  <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
        *
        {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Poppins', sans-serif;
        }
        @font-face{
          font-family: ounen;
          src: url(font/Ounen-mouhitsu.otf);
        }
        .showcase
        {
          position: absolute;
          right: 0;
          width: 100%;
          min-height: 100vh;
          padding: 100px;
          display: flex;
          justify-content: space-between;
          align-items: center;
          background: #111;
          transition: 0.5s;
          z-index: 2;
        }
        .showcase.active
        {
          right: 300px;
        }

        .showcase video
        {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          object-fit: cover;
          opacity: 0.8;
        }
        .overlay
        {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: #44c3fe;
          mix-blend-mode: overlay;
        }
        .text
        {
          position: relative;
          z-index: 10;
        }

        .text h2
        {
          font-family: ounen;
          font-size: 8em;
          font-weight: 800;
          color: #fff;
          line-height: 1em;
          text-transform: uppercase;
        }
        .text h3
        {
          font-size: 2em;
          font-weight: 600;
          color: #fff;
          line-height: 1em;
          text-transform: uppercase;
        }
        .text p
        {
          font-size: 1.1em;
          color: #fff;
          margin: 20px 0;
          font-weight: 400;
          max-width: 700px;
        }
        .text a
        {
          display: inline-block;
          font-size: 1em;
          background: #fff;
          padding: 10px 30px;
          text-transform: uppercase;
          text-decoration: none;
          font-weight: 500;
          margin-top: 10px;
          color: #111;
          letter-spacing: 2px;
          transition: 0.2s;
        }
        .text a:hover
        {
          letter-spacing: 6px;
        }

        @media (max-width: 991px)
        {
          .showcase,
          .showcase header
          {
            padding: 40px;
          }
          .text h2
          {
            font-size: 3em;
          }
          .text h3
          {
            font-size: 2em;
          }
        }
  </style>


<section class="showcase">

  <video src="video/hotel.mp4" muted loop autoplay></video>
  <div class="overlay"></div>
  <div class="text">
    <h2>ひとやすみ</h2> 
    <h3>ほっと一息つきませんか？</h3>
    <p>働いてばかりのあなたに"ひとやすみ"していただきたい、我々一同そんな思いでいっぱいです。
       たまにはどこかでのんびりしていきませんか？あなたにおすすめの宿をご紹介させていただきます。
    </p>
  </div>
  <ul class="social">
    <li><a href="#"><img src="https://i.ibb.co/x7P24fL/facebook.png"></a></li>
    <li><a href="#"><img src="https://i.ibb.co/Wnxq2Nq/twitter.png"></a></li>
    <li><a href="#"><img src="https://i.ibb.co/ySwtH4B/instagram.png"></a></li>
  </ul>
</section>
<div class="menu">
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">News</a></li>
    <li><a href="#">Destination</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
</div>

  <!--<div>
    <div class="fs-1 text-center">
      <div class="text-white">
        <h1>ひとやすみ</h1>
      </div>
    </div>
  </div>-->
  <!-- Background image -->
  @endsection