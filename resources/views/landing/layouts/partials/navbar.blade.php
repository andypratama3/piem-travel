<nav>
    <div class="nav-container">
      <div class="logo">
        <img src="{{ asset('assets_landing/img/logo-piemtravel.png') }}" alt="" />
        <p>PIEMTravel</p>
      </div>
      <ul>
        <li><a href="#" class="home active">Beranda</a></li>
        <li><a href="#price-section" class="price-pkg">Harga Paket</a></li>
        <li><a href="#gallery-section" class="gallery">Galeri</a></li>
        <li><a href="#" class="contact">Kontak</a></li>
        @auth
          <li><a href="{{ route('dashboard') }}" class="login-btn">Dashboard</a></li>
        @else
          <li><a href="{{ route('login') }}" class="reg-btn">Masuk</a></li>
          <li><a href="{{ route('register') }}" class="reg-btn">Daftar</a></li>
        @endauth
      </ul>
    </div>

</nav>
