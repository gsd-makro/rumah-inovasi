<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\InfographicController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PolicyBriefController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Models\Document;
use App\Models\Infographic;
use App\Models\Subject;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

  $breaking = [
    (object) [
      'title' => 'UI Moratorium Penerimaan Mahasiswa Baru S3 SKSG Imbas Kasus Bahlil',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/08/20/bahlil-lahadalia-hadiri-pembukaan-munas-xi-partai-golkar-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241114062618-20-1166380/ui-moratorium-penerimaan-mahasiswa-baru-s3-sksg-imbas-kasus-bahlil'
    ],
    (object) [
      'title' => 'Sikap RI soal Laut China Selatan di Era Presiden Prabowo dan Jokowi',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/10/presiden-prabowo-diterima-presiden-xi-jinping-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113192017-32-1166297/sikap-ri-soal-laut-china-selatan-di-era-presiden-prabowo-jokowi'
    ],
    (object) [
      'title' => 'RK-Suswono Gelar Kampanye Akbar Perdana Hari Ini',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/10/06/debat-pertama-pilkada-dki-jakarta-4_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241114035500-617-1166369/rk-suswono-gelar-kampanye-akbar-perdana-hari-ini'
    ],
    (object) [
      'title' => 'Bobby Minta Maaf ke Edy Rahmayadi-Surya Usai Debat "Panas"',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/10/30/debat-public-pertama-pasangan-calon-gubernur-dan-wakil-gubernur-sumatera-utara-tahun-2024-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241114015928-617-1166361/bobby-minta-maaf-ke-edy-rahmayadi-surya-usai-debat-panas'
    ],
    (object) [
      'title' => 'Polisi Periksa Guru hingga Sekuriti Kasus Siswa Dipaksa Sujud-Gonggong',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/13/polisi-janji-usut-pria-paksa-siswa-sujud-di-smak-gloria-2-surabaya-meski-sudah-damai-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241114014157-12-1166360/polisi-periksa-guru-hingga-sekuriti-kasus-siswa-dipaksa-sujud-gonggong'
    ]
  ];

  $carousel = [
    (object) [
      'title' => 'Pria di Cengkareng Berkebun Ganja di Loteng Rumah, Ada 40 Batang Pohon',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2022/06/08/kebun-ganja-milik-pemerintah-thailand-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241114033418-12-1166367/pria-di-cengkareng-berkebun-ganja-di-loteng-rumah-ada-40-batang-pohon',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/nasional/',
          'name' => 'Nasional',
        ],
      ]
    ],
    (object) [
      'title' => 'Hasan Dituding Bobby Isu Pemekaran Demi Suara: Tolong Dijaga Ucapannya',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/06/malam-ini-debat-kedua-pilgub-sumut-bobby-nasution-lawan-edy-rahmayadi-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241114030541-617-1166365/hasan-dituding-bobby-isu-pemekaran-demi-suara-tolong-dijaga-ucapannya',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/nasional/',
          'name' => 'Nasional',
        ],
      ]
    ],
    (object) [
      'title' => 'Jacky Manuputty Terpilih Jadi Ketum PGI 2024-2029',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2014/11/22/d5d1f7f2-501d-4bc2-8cb3-920c78bf4ccc_169.jpg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113194002-20-1166308/jacky-manuputty-terpilih-jadi-ketum-pgi-2024-2029',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/nasional/',
          'name' => 'Nasional',
        ],
      ]
    ],
    (object) [
      'title' => 'Polri Bongkar 47 Kasus Pornografi Anak, Pegawai Kantor Desa Terlibat',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2020/11/08/ilustrasi-menonton-video-porno_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241114010755-12-1166358/polri-bongkar-47-kasus-pornografi-anak-pegawai-kantor-desa-terlibat',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/nasional/',
          'name' => 'Nasional',
        ],
      ]
    ],
    (object) [
      'title' => 'Antar Purnatugas, Kapolri Sebut Agus Andrianto Sosok Berani dan Tegas',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/14/kapolri-jenderal-listyo-sigit-prabowo-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241114004236-12-1166357/antar-purnatugas-kapolri-sebut-agus-andrianto-sosok-berani-dan-tegas',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/nasional/',
          'name' => 'Nasional',
        ],
      ]
    ]
  ];

  $popular = [
    (object) [
      'title' => 'Tukang Sate Bunuh Remaja di Maros karena Kesal Ditagih Utang',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2018/08/29/5f396afc-c6fc-470e-85f4-6629311adb5d_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113135054-12-1166151/tukang-sate-bunuh-remaja-di-maros-karena-kesal-ditagih-utang',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Bobby Tuding Edy-Hasan Gunakan Isu Pemekaran Demi Dulang Suara',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/10/31/debat-pertama-pilgub-sumatera-utara-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241114001622-617-1166354/bobby-tuding-edy-hasan-gunakan-isu-pemekaran-demi-dulang-suara',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Polisi Bongkar 2 Kasus Eksploitasi Anak Bawah Umur di Karaoke Jaksel',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2016/03/11/f7cd9f2f-efb3-443d-8a1c-a7309cb6cc47_169.jpg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113135128-12-1166153/polisi-bongkar-2-kasus-eksploitasi-anak-bawah-umur-di-karaoke-jaksel',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Bobby Sebut Edy Tandai Wali Kota/Bupati Tempatnya Kalah di Pilgub 2018',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/10/30/debat-public-pertama-pasangan-calon-gubernur-dan-wakil-gubernur-sumatera-utara-tahun-2024-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113223632-617-1166348/bobby-sebut-edy-tandai-wali-kota-bupati-tempatnya-kalah-di-pilgub-2018',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Bupati Kepulauan Seribu Junaedi Meninggal Dunia',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/01/05/ilustrasi-meninggal-dunia-6_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113220835-20-1166347/bupati-kepulauan-seribu-junaedi-meninggal-dunia',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Hasan Basri Serang Bobby soal Lampu Pocong dan Private Jet',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/02/debat-pertama-pilgub-sumatera-utara-2024_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113214029-617-1166345/hasan-basri-serang-bobby-soal-lampu-pocong-dan-private-jet',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Bobby Kritik PDAM Tirtanadi: Air Cokelat, Kadang Hidup Kadang Tidak',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/10/30/debat-pertama-pilgub-sumatera-utara_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113211241-617-1166344/bobby-kritik-pdam-tirtanadi-air-cokelat-kadang-hidup-kadang-tidak',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Edy Rahmayadi Singgung Pimpinan yang Mudah Atur Peraturan',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/06/malam-ini-debat-kedua-pilgub-sumut-bobby-nasution-lawan-edy-rahmayadi_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113210414-617-1166341/edy-rahmayadi-singgung-pimpinan-yang-mudah-atur-peraturan',
      'date' => '13 November 2024',
    ],
  ];

  $national = [
    (object) [
      'title' => 'Pemprov Sumut Komitmen Penuhi Akses Informasi Publik untuk Masyarakat',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/13/pemprov-sumut-15_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113195711-25-1166321/pemprov-sumut-komitmen-penuhi-akses-informasi-publik-untuk-masyarakat',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/category/nasional/',
          'name' => 'Nasional',
        ],
      ],
    ],
    (object) [
      'title' => 'Pj Gubernur Sumut Pastikan Samosir Siap Sambut Aquabike Jetski WC 2024',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/13/pemprov-sumut-16_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113193527-25-1166307/pj-gubernur-sumut-pastikan-samosir-siap-sambut-aquabike-jetski-wc-2024',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/category/nasional/',
          'name' => 'Nasional',
        ],
      ],
    ],
    (object) [
      'title' => 'Mensesneg Buka Suara soal Posko "Lapor Mas Wapres" Gibran',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/08/menteri-sekretaris-negara-prasetyo-hadi-di-lanud-halim-perdanakusuma_169.png?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113141639-32-1166168/mensesneg-buka-suara-soal-posko-lapor-mas-wapres-gibran',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/category/nasional/',
          'name' => 'Nasional',
        ],
      ],
    ],
    (object) [
      'title' => 'RK Ungkap Pentingnya Gubernur Jakarta Sefrekuensi dengan Prabowo',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/09/ridwan-kamil-6_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113195631-617-1166319/rk-ungkap-pentingnya-gubernur-jakarta-sefrekuensi-dengan-prabowo',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/category/nasional/',
          'name' => 'Nasional',
        ],
      ],
    ],
    (object) [
      'title' => 'Polisi Olah TKP Usut Tujuh Tahanan Rutan Salemba Kabur',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2016/01/05/c437f649-37c0-4fb6-830b-d9218a16e384_169.jpg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113200103-12-1166323/polisi-olah-tkp-usut-tujuh-tahanan-rutan-salemba-kabur',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/category/nasional/',
          'name' => 'Nasional',
        ],
      ],
    ],
    (object) [
      'title' => 'Rapat di DPR, Kejagung Diminta Tak Tebang Pilih Kasus',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2022/01/27/raker-jaksa-agung-dengan-komisi-iii-dpr_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113193412-12-1166306/rapat-di-dpr-kejagung-diminta-tak-tebang-pilih-kasus',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/category/nasional/',
          'name' => 'Nasional',
        ],
      ],
    ],
    (object) [
      'title' => 'Jaksa Agung Buka-bukaan soal Dikepung Brimob hingga Pegawai Main Judol',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2020/06/29/jaksa-agung-st-burhanuddin_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/nasional/20241113191721-12-1166295/jaksa-agung-buka-bukaan-soal-dikepung-brimob-hingga-pegawai-main-judol',
      'author' => 'admin',
      'date' => '13 November 2024',
      'categories' => [
        (object) [
          'url' => 'https://www.cnnindonesia.com/category/nasional/',
          'name' => 'Nasional',
        ],
      ],
    ],
  ];

  $international = [
    (object) [
      'title' => 'Hizbullah Bombardir Israel sampai Prabowo Bertemu Biden di White House',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/13/prabowo-subianto-dan-joe-biden-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/internasional/20241114063804-120-1166390/hizbullah-bombardir-israel-sampai-prabowo-bertemu-biden-di-white-house',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Hizbullah Klaim Bombardir Markas Militer hingga Pabrik Senjata Israel',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/10/02/ratusan-rudal-iran-gempur-israel-sampai-ke-tel-aviv-2_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/internasional/20241114052929-120-1166372/hizbullah-klaim-bombardir-markas-militer-hingga-pabrik-senjata-israel',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Sambut Trump Kembali ke Gedung Putih, Biden Janjikan Transisi Mulus',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/06/28/us-donald-trump-and-joe-biden-participate-in-first-presidential-3_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/internasional/20241114042421-134-1166370/sambut-trump-kembali-ke-gedung-putih-biden-janjikan-transisi-mulus',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Prabowo Tanya Solusi untuk Palestina Saat Bertemu Menlu AS Blinken',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/10/20/prabowo-subianto-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/internasional/20241114012646-134-1166359/prabowo-tanya-solusi-untuk-palestina-saat-bertemu-menlu-as-blinken',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Hizbullah Targetkan Kemenhan-Markas Militer Israel, Sirene Menggema',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/10/02/ratusan-rudal-iran-gempur-israel-sampai-ke-tel-aviv-1_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/internasional/20241113232554-120-1166351/hizbullah-targetkan-kemenhan-markas-militer-israel-sirene-menggema',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Kronologi Kakek Tabrak Kerumunan Orang di China hingga 35 Tewas',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/11/13/35-orang-tewas-dalam-serangan-mobil-tabrak-lari-di-china-3_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/internasional/20241113195636-113-1166320/kronologi-kakek-tabrak-kerumunan-orang-di-china-hingga-35-tewas',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Netanyahu Mau Caplok Tepi Barat Palestina saat Trump Resmi Menjabat',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/10/27/donald-trump-dan-benjamin-netanyahu_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/internasional/20241113195234-120-1166315/netanyahu-mau-caplok-tepi-barat-palestina-saat-trump-resmi-menjabat',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Houthi Yaman Serang Kapal Perang AS di Yaman Pakai Drone-Rudal',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/09/17/israel-palestiniansyemen-missiles_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/internasional/20241113165451-120-1166247/houthi-yaman-serang-kapal-perang-as-di-yaman-pakai-drone-rudal',
      'date' => '13 November 2024',
    ],
    (object) [
      'title' => 'Netanyahu Terseret Kasus Dugaan Kebocoran Data, Kantor PM Diselidiki',
      'thumbnail' => 'https://akcdn.detik.net.id/visual/2024/09/27/israel-palestiniansnetanyahu_169.jpeg?w=360&q=90',
      'url' => 'https://www.cnnindonesia.com/internasional/20241113164129-120-1166240/netanyahu-terseret-kasus-dugaan-kebocoran-data-kantor-pm-diselidiki',
      'date' => '13 November 2024',
    ],
  ];

  return view('landing.home', [
    'breaking' => $breaking,
    'carousel' => $carousel,
    'popular' => $popular,
    'national' => $national,
    'international' => $international,
  ]);
})->name('landing.home');

Route::get('/infografis', fn() => view('landing.infographics', ['infographics' => Infographic::all(), 'subjects' => Subject::all()]))->name('landing.infographics');
Route::get('/data-dan-dokumen/pendidikan/sub1', fn() => view('landing.documents', ['documents' => Document::all()]))->name('landing.documents');

Route::prefix('/auth')->controller(AuthController::class)->group(function () {
  Route::get('/login', 'index')->name('login');
  Route::post('/login', 'authenticate')->name('authenticate');
  Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
  // Route::get('/blank', fn() => view('dashboard.blank'))->name('dashboard');

  Route::resource('menus', MenuController::class)->names([
    'index' => 'menus.index',
    'create' => 'menus.create',
    'store' => 'menus.store',
    'show' => 'menus.show',
    'edit' => 'menus.edit',
    'update' => 'menus.update',
    'destroy' => 'menus.destroy',
  ])->middleware(SuperAdminMiddleware::class);

  Route::resource('users', UserController::class)->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'show' => 'users.show',
    'edit' => 'users.edit',
    'update' => 'users.update',
    'destroy' => 'users.destroy',
  ])->middleware(SuperAdminMiddleware::class);

  Route::resource('subjects', SubjectController::class)->names([
    'index' => 'subjects.index',
    'create' => 'subjects.create',
    'store' => 'subjects.store',
    'show' => 'subjects.show',
    'edit' => 'subjects.edit',
    'update' => 'subjects.update',
    'destroy' => 'subjects.destroy',
  ])->middleware(SuperAdminMiddleware::class);

  Route::resource('indicators', IndicatorController::class)->names([
    'index' => 'indicators.index',
    'create' => 'indicators.create',
    'store' => 'indicators.store',
    'show' => 'indicators.show',
    'edit' => 'indicators.edit',
    'update' => 'indicators.update',
    'destroy' => 'indicators.destroy',
  ])->middleware(SuperAdminMiddleware::class);

  Route::resource('infographics', InfographicController::class)->names([
    'index' => 'infographics.index',
    'create' => 'infographics.create',
    'store' => 'infographics.store',
    'show' => 'infographics.show',
    'edit' => 'infographics.edit',
    'update' => 'infographics.update',
    'destroy' => 'infographics.destroy',
  ]);

  Route::put('/infographics/{id}/verify', [InfographicController::class, 'verify'])->name('infographics.verify')->middleware(SuperAdminMiddleware::class);

  Route::resource('policy-briefs', PolicyBriefController::class)->names([
    'index' => 'policy_briefs.index',
    'create' => 'policy_briefs.create',
    'store' => 'policy_briefs.store',
    'show' => 'policy_briefs.show',
    'edit' => 'policy_briefs.edit',
    'update' => 'policy_briefs.update',
    'destroy' => 'policy_briefs.destroy',
  ]);

  Route::put('/policy-briefs/{id}/verify', [PolicyBriefController::class, 'verify'])->name('policy_briefs.verify')->middleware(SuperAdminMiddleware::class);

  Route::resource('documents', DocumentController::class)->names([
    'index' => 'documents.index',
    'create' => 'documents.create',
    'store' => 'documents.store',
    'show' => 'documents.show',
    'edit' => 'documents.edit',
    'update' => 'documents.update',
    'destroy' => 'documents.destroy',
  ]);

  Route::put('/documents/{id}/verify', [DocumentController::class, 'verify'])->name('documents.verify')->middleware(SuperAdminMiddleware::class);

  Route::resource('videos', VideoController::class)->names([
    'index' => 'videos.index',
    'create' => 'videos.create',
    'store' => 'videos.store',
    'show' => 'videos.show',
    'edit' => 'videos.edit',
    'update' => 'videos.update',
    'destroy' => 'videos.destroy',
  ]);

  Route::resource('photos', PhotoController::class)->names([
    'index' => 'photos.index',
    'create' => 'photos.create',
    'store' => 'photos.store',
    'show' => 'photos.show',
    'edit' => 'photos.edit',
    'update' => 'photos.update',
    'destroy' => 'photos.destroy',
  ]);

  Route::put('/photos/{id}/verify', [PhotoController::class, 'verify'])->name('photos.verify')->middleware(SuperAdminMiddleware::class);


  Route::put('/videos/{id}/verify', [VideoController::class, 'verify'])->name('videos.verify')->middleware(SuperAdminMiddleware::class);

  Route::prefix('/feedbacks')->controller(FeedbackController::class)->group(function () {
    Route::get('/', 'index')->name('feedbacks.index');
    Route::put('/{id}/approved', 'approve')->name('feedbacks.approve');
    Route::put('/{id}/reply', 'reply')->name('feedbacks.reply');
    Route::delete('/{id}/destroy', 'destroy')->name('feedbacks.destroy');
    Route::put('/read', 'read')->name('feedbacks.markRead');
  });
});

Route::get('/{any}', [MenuController::class, 'dinamicView'])
  ->where('any', '.*')
  ->name('dinamic.view');
