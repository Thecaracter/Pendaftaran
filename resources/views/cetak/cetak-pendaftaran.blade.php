<!DOCTYPE html>
<html>

<head>
    <title>Bukti Cetak</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('cetak/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.ico') }}" />

</head>

<body>
    <div class="letter-header">
        <h3>Bukti Pendaftaran</h3>
        <p>Tanggal: {{ date('d M Y') }}</p>
    </div>

    <div class="letter-content ">
        <p>Kepada Yth.</p>
        <p>{{ $pendaftaran->nama_peserta }}</p>
        <p>{{ $pendaftaran->email }}</p>
        <p>{{ $pendaftaran->no_hp }}</p>
        <br>
        <p>Dengan hormat,</p>
        <p>Surat ini adalah konfirmasi pendaftaran Anda untuk acara Lomba {{ $pendaftaran->lomba->nama }} yang akan
            diselenggarakan
            pada
            tanggal {{ $pendaftaran->lomba->tanggal_mulai }} sampai dengan {{ $pendaftaran->lomba->tanggal_selesai }}.
        </p>
        <p>Detail informasi sebagai berikut:</p>
        <ul class="text-left">
            <li>Nama Peserta: {{ $pendaftaran->nama_peserta }}</li>
            <li>Email: {{ $pendaftaran->email }}</li>
            <li>No. HP: {{ $pendaftaran->no_hp }}</li>
            <li>Alamat: {{ $pendaftaran->alamat }}</li>
            <li>Asal Sekolah: {{ $pendaftaran->asal_sekolah }}</li>
            <li>NISN: {{ $pendaftaran->nisn }}</li>
            <li>Biaya Administrasi: Rp {{ number_format($pendaftaran->lomba->harga, 0, ',', '.') }}</li>
            <li>Status Pembayaran: {{ $pendaftaran->status_pembayaran == '1' ? 'Belum Bayar' : 'Sudah Bayar' }}</li>
            <li>Tanggal Pendaftaran: {{ $pendaftaran->tanggal_pendaftaran }}</li>
        </ul>
        <p>Mohon untuk mempersiapkan diri dengan baik dan hadir tepat waktu pada acara tersebut.</p>
        <p>Terima kasih atas partisipasi Anda.</p>
        <img src="{{ asset('img/ttd.png') }}" alt="ttd" class="ttd">
        <br>
        <p>Hormat kami,</p>
        <p>Penyelenggara Lomba {{ $pendaftaran->lomba->nama }}</p>
    </div>
    <div class="letter-footer">
        <p>Surat ini dicetak secara otomatis</p>
    </div>


    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>

</html>
