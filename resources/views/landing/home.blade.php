@extends('layouts.landing')

@section('title', 'Home')

@section('main')
  <div id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="http://fakeimg.pl/800x400" loading="lazy" alt="" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="http://fakeimg.pl/800x400" loading="lazy" alt="" />
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="http://fakeimg.pl/800x400" loading="lazy" alt="" />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container py-5" id="article">
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
      <div class="col-lg-6 px-0">
        <h1 class="display-4 fst-italic">
          Tips Berkendara Aman di Jalan Raya
        </h1>
        <p class="lead my-3"
          style="
          display: -webkit-box;
          -webkit-line-clamp: 3;
          -webkit-box-orient: vertical;
          overflow: hidden;
        ">
          Menjadi seorang pengendara baik pengendara Motor dan Juga Mobil di
          Jalan Raya harus mempunyai Peraturan dan Juga sikap yang disiplin,
          memang benar semua pengendara Ingin perjalanan yang nyaman, cepat
          dan Juga mudah, namun juga perlu anda sadari bahwa jalanan bukan
          Milik Pribadi, banyak pasang mata yang juga menggunakan jalan
          sebagai jalur tujuan mereka.
        </p>
        <p class="lead mb-0">
          <a href="https://dishub.tanjungpinangkota.go.id/berita/10-tips-berkendara-yang-aman-di-jalan-raya.html"
            class="text-body-emphasis fw-bold">Lanjutkan membaca...</a>
        </p>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">Tips &amp; Trik</strong>
            <h3 class="mb-0">
              Cara Merawat Mesin Motor Agar Tetap Halus: Rutin Ganti Oli!
            </h3>
            <div class="mb-1 text-body-secondary">25 Maret</div>
            <p class="card-text mb-auto"
              style="
              display: -webkit-box;
              -webkit-line-clamp: 3;
              -webkit-box-orient: vertical;
              overflow: hidden;
            ">
              Dalam penggunaannya, merawat mesin motor secara teratur
              merupakan sebuah keharusan untuk memastikan bahwa kendaraan
              bermotor tetap berkinerja optimal dan memiliki umur pakai yang
              panjang.
            </p>
            <a href="https://dishub.tanjungpinangkota.go.id/berita/10-tips-berkendara-yang-aman-di-jalan-raya.html"
              target="_blank" class="icon-link gap-1 icon-link-hover stretched-link">
              Lanjutkan membaca
              <i class="bi bi-chevron-right"></i>
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img
              src="https://dishub.tanjungpinangkota.go.id/storage/images/2023-11-29/D5eL7fDyP3g2OooPpYbFdTqS5ViBplHshRias6VQ_large.jpg"
              alt="" width="200" height="100%" style="object-fit: cover" />
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">Tips &amp; Trik</strong>
            <h3 class="mb-0">
              Tips Memilih Helm yang Tepat Untuk Keamanan Berkendara
            </h3>
            <div class="mb-1 text-body-secondary">25 Maret</div>
            <p class="card-text mb-auto"
              style="
              display: -webkit-box;
              -webkit-line-clamp: 3;
              -webkit-box-orient: vertical;
              overflow: hidden;
            ">
              Menggunakan helm saat mengendarai sepeda motor semestinya
              sudah menjadi kebiasaan. Jangan sampai penggunaan helm hanya
              ditunjukan kepada bapak polisi di pos kepolisian karena alasan
              takut kena tilang.
            </p>
            <a href="https://bintangmotor.com/tips-memilih-helm-yang-tepat-untuk-keamanan-berkendara/" target="_blank"
              class="icon-link gap-1 icon-link-hover stretched-link">
              Lanjutkan membaca
              <i class="bi bi-chevron-right"></i>
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img
              src="https://bintangmotor.com/wp-content/uploads/2023/01/Tips-Memilih-Helm-yang-Tepat-Untuk-Keamanan-Berkendara-1024x1024.webp"
              alt="" width="200" height="100%" style="object-fit: cover" />
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">Tips &amp; Trik</strong>
            <h3 class="mb-0">
              Waspada Cuaca Ekstrem, Begini agar Aman Berkendara
            </h3>
            <div class="mb-1 text-body-secondary">25 Maret</div>
            <p class="card-text mb-auto"
              style="
              display: -webkit-box;
              -webkit-line-clamp: 3;
              -webkit-box-orient: vertical;
              overflow: hidden;
            ">
              Halo sobat keren, memasuki penghujung tahun 2022 Badan
              Meteorologi, Klimatologi dan Geofisika (BMKG) memberikan
              peringatan dini terkait akan adanya cuaca ekstrim di Indonesia
              mulai dari tanggal 28 Desember 2022 hingga awal tahun 2023
              mendatang. Selain BMKG, peringatan cuaca ekstrim ini juga
              datang dari Badan Riset dan Inovasi Nasional (BRIN) yang
              mengatakan akan terjadi badai di Jabodetabek pada tanggal 28
              Desember 2022. Oleh karena itu, pemerintah menghimbau agar
              masyarakat untuk bersiap menghadapi cuaca ekstrim tersebut
              karena akan menimbulkan beberapa bencana alam seperti banjir,
              pohon tumbang dan longsor.
            </p>
            <a href="https://kreditkerenbanget.com/post/waspada-cuaca-ekstrem-begini-agar-aman-berkendara" target="_blank"
              class="icon-link gap-1 icon-link-hover stretched-link">
              Lanjutkan membaca
              <i class="bi bi-chevron-right"></i>
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="https://imgx.gridoto.com/crop/0x0:689x393/700x465/photo/gridoto/2017/11/28/2647921275.jpg"
              alt="" width="200" height="100%" style="object-fit: cover" />
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
          style="height: 300px">
          <div class="col p-4 d-flex flex-column position-static h-100 justify-content-center">
            <a href="#" target="_blank"
              class="icon-link gap-1 icon-link-hover stretched-link text-center justify-content-center fs-3">
              Lihat artikel lain
              <i class="bi bi-chevron-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
