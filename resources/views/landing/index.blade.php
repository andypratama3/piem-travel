@extends('landing.layouts.partials.landing')

@section('title', 'Home')

@section('content')
<header>
    <div class="header-container">
      <h1>PIEMTravel</h1>
      <p>Time to Explore Madinah</p>
      <p class="ads-text">
        Wujudkan impian umroh Anda bersama PIEMTravel! Mulai menabung hari ini
        dan nikmati perjalanan ibadah yang nyaman dan aman dengan kami.
      </p>
      <a href="#">
        <span> Detail Umroh </span>
        <div class="arrow">
          <img src="{{ asset('assets_landing/img/right-arrow.svg')}}" alt="right-arrow" />
        </div>
      </a>
    </div>
    <marquee behavior="scroll" scrollamount="10" direction="left">
      Mulailah perjalanan spiritual Anda menuju Baitullah dengan perencanaan
      yang matang dan bijaksana. Bergabunglah dengan ribuan jamaah yang telah
      mempercayakan persiapan umroh mereka kepada PiemTravel. Melalui platform
      kami, Anda dapat menabung dengan mudah, merencanakan setiap langkah
      perjalanan Anda, dan menikmati berbagai penawaran terbaik untuk
      pengalaman umroh yang berkesan.
    </marquee>
  </header>
  <section class="price-section" id="price-section">
    <img src="{{ asset('assets_landing/img/dotted-line.png')}}" class="dotted-line"></img>
    <div class="container">
      <h1>HARGA PAKET</h1>
      <div class="row">
        <div class="col-md-4 col-sm-6 my-3">
          <div class="pkg-content">
            <p class="pkg-title">Paket A</p>
            <h3>Rp.28.000.000 <span>/Pax Quad Room</span></h3>
            <ul>
              <li>Feature</li>
              <li>Feature</li>
              <li>Feature</li>
              <li>Feature</li>
            </ul>
            <a href="" class="detail-btn">
              Detail Paket
              <img src="{{ asset('assets_landing/img/right-arrow.svg')}}" alt="" />
            </a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 my-3">
          <div class="pkg-content">
            <p class="pkg-title">Paket B</p>
            <h3>Rp.29.500.000 <span>/Pax Double Room</span></h3>
            <ul>
              <li>Feature</li>
              <li>Feature</li>
              <li>Feature</li>
              <li>Feature</li>
            </ul>
            <a href="" class="detail-btn">
              Detail Paket
              <img src="{{ asset('assets_landing/img/right-arrow.svg')}}" alt="" />
            </a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 my-3">
          <div class="pkg-content">
            <p class="pkg-title">Paket C</p>
            <h3>Rp.31.000.000 <span>/Pax Triple Room</span></h3>
            <ul>
              <li>Feature</li>
              <li>Feature</li>
              <li>Feature</li>
              <li>Feature</li>
            </ul>
            <a href="" class="detail-btn">
              Detail Paket
              <img src="{{ asset('assets_landing/img/right-arrow.svg')}}" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="gallery-section" id="gallery-section">
    <div class="container">
      <h1>galeri</h1>
      <p>pelaksanaan umroh</p>
      <hr>
      <div class="row">
        <div class="col-sm-6 col-md-4 my-3">
          <a href="#" class="gallery-content">
            <div class="img-container">
              <img src="{{ asset('assets_landing/img/umroh-22.png')}}" alt="Umroh 2022">
              <p>Umroh 2022</p>
              <hr>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4 my-3">
          <a href="#" class="gallery-content">
            <div class="img-container">
              <img src="{{ asset('assets_landing/img/umroh-23.png')}}" alt="Umroh 2023">
              <p>Umroh 2023</p>
              <hr>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-4 my-3">
          <a href="#" class="gallery-content">
            <div class="img-container">
              <img src="{{ asset('assets_landing/img/umroh-24.png')}}" alt="Umroh 2024">
              <p>Umroh 2024</p>
              <hr>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  @endsection