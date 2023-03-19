@extends('layouts.mainlayout')

@section('title', 'Profile Detail')

@section('content')

    <h2>Selamat Datang, 
        @if (Auth::guard('masyarakat')->user())
            {{ Auth::guard('masyarakat')->user()->nama }}
        @elseif(Auth::guard('admin')->user())
            {{ Auth::guard('admin')->user()->nama_petugas }}
        @endif
    </h2>
<div class="row my-5 bg-light border border-rounded-0">
    <h3 class="fs-4 my-3">
        <i class="fa-solid fa-bolt"> Call Center PLN Medan</i>
    </h3>
    <hr>
    <div>
        Nomor telepon PLN Medan banyak dicari pelanggan untuk mengetahui jadwal pemadaman, pemasangan maupun menyampaikan keluhan terkait aliran listrik. Silahkan periksa daftar pada tabel dan sesuaikan dengan tujuan atau keperluanmu.
    </div>
    <div class="col">
        <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th>Instansi/Unit</th>
                    <th>Nomor Telephone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Call Center PLN Medan</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>PT. PLN Persero Pembangkitan Sumatera Bagian Utara</td>
                    <td>(061) 7869025</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>PLN UPB wilayah Sumut</td>
                    <td>(061) 6615125</td>
                </tr>
            </tbody>
        </table>
        <div class="my-3">
            Untuk layanan kantor cabang, silahkan langsung datang ke alamat masing-masing karena sebagian di antaranya tidak bisa dihubungi lantaran tidak menyediakan layanan telepon untuk umum.
        </div>
    </div>
</div>

<div class="row my-5 bg-light border border-rounded-0">
    <h3 class="fs-4 my-3">
        <i class="fa-sharp fa-solid fa-building-shield"> Call Center Polisi Medan</i>
    </h3>
    <hr>
    <div>
        Jika sangat mendesak atau ingin membuat pengaduan secepatnya, lebih baik cek nomor telepon kantor polisi di Medan yang terdekat dari tempat tinggalmu, yaitu Polres atau bisa pula Polsekta daerah.
    </div>
    <div class="col">
        <table class="table bg-white rounded shadow-sm table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th>Instansi/Unit</th>
                    <th>Nomor Telephone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Kantor Polisi Resort Kota (Kapolresta) Medan</td>
                    <td>(061) 452 0794</td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>Waka Polresta Medan</td>
                    <td>(061) 452 1607</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>Polsekta Medan Sunggal</td>
                    <td>(061) 846 9110</td>
                </tr>
                <tr>
                    <td scope="row">4</td>
                    <td>Polsekta Medan Kota</td>
                    <td>(061) 736 6770</td>
                </tr>
                <tr>
                    <td scope="row">5</td>
                    <td>Polsekta Medan Timur</td>
                    <td>(061) 455 0385</td>
                </tr>
                <tr>
                    <td scope="row">6</td>
                    <td>Polsekta Helvetia</td>
                    <td>(061) 844 5176</td>
                </tr>
                <tr>
                    <td scope="row">7</td>
                    <td>Polsekta Delitua</td>
                    <td>(061) 703 0376</td>
                </tr>
                <tr>
                    <td scope="row">8</td>
                    <td>Polsekta Medan Area</td>
                    <td>(061) 455 6732</td>
                </tr>
                <tr>
                    <td scope="row">9</td>
                    <td>Polsekta Belawan</td>
                    <td>(061) 694 1110</td>
                </tr>
                <tr>
                    <td scope="row">10</td>
                    <td>Polsekta Labuhan Deli</td>
                    <td>(061) 685 1001</td>
                </tr>
                <tr>
                    <td scope="row">11</td>
                    <td>Polsekta Percut Sei Tuan</td>
                    <td>(061) 736 9110</td>
                </tr>
                <tr>
                    <td scope="row">12</td>
                    <td>Polsekta Medan Baru</td>
                    <td>(061) 452 3141</td>
                </tr>
                <tr>
                    <td scope="row">13</td>
                    <td>Polsekta Medan Barat</td>
                    <td>(061) 661 4776</td>
                </tr>
            </tbody>
        </table>
        <div class="my-3">
            Nomor yang tertera di atas buka selama 24 jam penuh, namun pergunakan sebijak mungkin.
        </div>
    </div>
</div>

<div class="row my-5 bg-light border border-rounded-0">
    <h3 class="fs-4 my-3">
        <i class="fa-solid fa-fire"> Call Center Pemadam Kebakaran Medan</i>
    </h3>
    <hr>
    <div>
        Sesuai dengan namanya, Pemadam Kebakaran (Damkar) Medan bertugas untuk pencegahan, pemadaman dan penyelamatan ketika terjadi kebakaran.
    </div>
    <div class="col">
        <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th>Kantor/Unit</th>
                    <th>Nomor Telepon</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Dinas Pencegah Pemadam Kebakaran</td>
                    <td>(061) 4515356</td>
                </tr>
            </tbody>
        </table>
        <div class="my-3">
            Ketika memanggil petugas kebakaran melalui nomor telephone maupun whatsapp. Jelaskan lokasi kejadian dan jangan lupa memberikan nomor telpon pribadi kepada damkar.
        </div>
    </div>
</div>

<div class="row my-5 bg-light border border-rounded-0">
    <h3 class="fs-4 my-3">
        <i class="fa-solid fa-hospital"> Rumah Sakit Umum Medan</i>
    </h3>
    <hr>
    <div>
        Sebagai organisasi sosial dan kesehatan yang dimaksudkan untuk menyediakan pelayanan prima, penyembuhan dan pencegahan, maka semua Rumah Sakit Umum di Medan membuka layanan tanpa btas waktu. Kami melampirkan sebagian nomor rumah sakti yang banyak dicari.
    </div>
    <div class="col">
        <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th>Nama Rumah Sakit</th>
                    <th>Nomor Telepon</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>RS Adam Malik</td>
                    <td>(061) 8360143</td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>RS Pirngadi</td>
                    <td>(061) 8360143</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>Rumah Sakit Jiwa Medan</td>
                    <td>(061) 8360542</td>
                </tr>
                <tr>
                    <td scope="row">4</td>
                    <td>Rs. Murni Teguh Memorial</td>
                    <td>(061) 80501888</td>
                </tr>
                <tr>
                    <td scope="row">5</td>
                    <td>RS Columbia Asia</td>
                    <td>(061) 4566368</td>
                </tr>
                <tr>
                    <td scope="row">6</td>
                    <td>RS Advent</td>
                    <td>(061) 4566368</td>
                </tr>
            </tbody>
        </table>
        <div class="my-3">
            Setiap nomor telepon penting dan darurat di Medan yang telah kami cantumkan di atas memliki prosedur atau tata cara ketika dihubungi. Jadi, jangan digunakan kalau cuma ingin iseng saja ya.
        </div>
    </div>
</div>

<div class="row my-5 bg-light border border-rounded-0">
    <h3 class="fs-4 my-3">
        <i class="fa-solid fa-fire"> Call Center Pemadam Kebakaran Medan</i>
    </h3>
    <hr>
    <div>
        Kantor-kantor pelayanan publik di Kota Medan juga menyediakan nomor telepon yang bisa dihubungi masyarakat sebagai media untuk menyampaika laporan, keluhan maupun ketika sedang membutuhkan informasi. Berikut beberapa diantaranya:
    </div>
    <div class="col">
        <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th>Kantor/Unit</th>
                    <th>Nomor Telepon</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Perusahaan Daerah Air Minum (PDAM) Tirtanadi</td>
                    <td>(061) 6617123</td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>Perusahaan Daerah Air Minum Provinsi Sumut 4571666</td>
                    <td>(061) 4571666</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>Badan SAR Nasional </td>
                    <td>(061) 4565777</td>
                </tr>
                <tr>
                    <td scope="row">4</td>
                    <td>Ambulance</td>
                    <td>(061) 453 5981</td>
                </tr>
                <tr>
                    <td scope="row">5</td>
                    <td>Kejaksaan Negeri Medan</td>
                    <td>(061) 456 9804</td>
                </tr>
                <tr>
                    <td scope="row">6</td>
                    <td>Pengadilan Negeri Medan</td>
                    <td>(061) 451 5847</td>
                </tr>
                <tr>
                    <td scope="row">7</td>
                    <td>Pengadilan Agama Medan</td>
                    <td>(061) 785 1712</td>
                </tr>
                <tr>
                    <td scope="row">8</td>
                    <td>Kejaksaan Tinggi Medan</td>
                    <td>(061) 451 4290</td>
                </tr>
                <tr>
                    <td scope="row">9</td>
                    <td>Kantor Pos Medan</td>
                    <td>(061) 456 8940</td>
                </tr>
                <tr>
                    <td scope="row">10</td>
                    <td>Dinas Sosial Provinsi Sumatera Utara</td>
                    <td>(061) 4519251</td>
                </tr>
                <tr>
                    <td scope="row">11</td>
                    <td>Dinas Kesehatan Kota Medan</td>
                    <td>(061) 4520331</td>
                </tr>
            </tbody>
        </table>
        <div class="my-3">
            Sebagian nomor tersebut tidak aktif selama 24 jam. Jadi sebaiknya hubungi kantor sesuai jam operasional.
        </div>
    </div>
</div>
@endsection