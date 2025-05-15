<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .label-col {
            width: 160px;
            font-weight: bold;
        }
        .data-row {
            margin-bottom: 10px;
        }
        .card {
            background-color: #fff9dd;
            box-shadow: 0 2px 5px #000000;
        }
    </style>
</head>
<body class="container mt-4 mb-2">
        <h2 class="fw-bold text-center">Profil Lengkap</h2>
    <a href="<?= base_url('/') ?>" class="btn btn-secondary btn-sm mb-3">← Kembali</a>
    
    <div class="card shadow p-4">
        <div class="text-center mb-5">
            <img src="<?= base_url('upload_gambar/'.$profil['gambar']) ?>" width="170" class="rounded shadow" alt="Foto Profil">
        </div>

        <div class="row data-row">
            <div class="label-col">Nama</div>
            <div class="col">: <?= $profil['nama'] ?></div>
        </div>
        <div class="row data-row">
            <div class="label-col">NIM</div>
            <div class="col">: <?= $profil['nim'] ?></div>
        </div>
        <div class="row data-row">
            <div class="label-col">Program Studi</div>
            <div class="col">: <?= $profil['prodi'] ?></div>
        </div>
        <div class="row data-row">
            <div class="label-col">Fakultas</div>
            <div class="col">: <?= $profil['fakultas'] ?></div>
        </div>
        <div class="row data-row">
            <div class="label-col">Hobi</div>
            <div class="col">: <?= $profil['hobi'] ?></div>
        </div>
        <div class="row data-row">
            <div class="label-col">Skill</div>
            <div class="col">: <?= implode(', ', $profil['skill']) ?></div>
        </div>
        <div class="row data-row">
            <div class="label-col">Email</div>
            <div class="col">: <?= $profil['email'] ?></div>
        </div>
        <br><p>Saya adalah mahasiswi semester 4 Program Studi Teknologi Informasi, Fakultas Teknik, Universitas Lambung Mangkurat. Saya merupakan lulusan dari SMA Negeri 1 Banjarmasin dan anak ketiga dari tiga bersaudara. Saya lahir di Banjarmasin, Kalimantan Selatan, pada tanggal 9 April 2005.
Sejak kecil hingga remaja, saya menempuh pendidikan dasar dan menengah di kota kelahiran saya, Banjarmasin. Setelah menyelesaikan pendidikan di jenjang SMA, saya memutuskan untuk melanjutkan studi di Universitas Lambung Mangkurat, salah satu perguruan tinggi terbaik di Kalimantan Selatan, dengan memilih jurusan Teknologi Informasi.
Selama perkuliahan, saya aktif dalam berbagai kegiatan kemahasiswaan dan kepanitiaan acara, yang memperkaya pengalaman serta kemampuan saya dalam berorganisasi dan bekerja dalam tim.
Saya memiliki cita-cita menjadi seorang pengusaha. Hal ini terinspirasi dari latar belakang keluarga saya yang bergerak di bidang wirausaha. Sejak dini saya telah menaruh minat dalam dunia bisnis, dan dengan bekal ilmu yang saya pelajari di bidang Teknologi Informasi, saya berharap dapat merintis usaha sendiri setelah lulus nanti. Saya berkeinginan untuk mengembangkan bisnis berbasis teknologi, baik berupa aplikasi maupun sistem digital lainnya, yang dapat memberikan manfaat nyata bagi masyarakat.</p>
    </div>
</body>
</html>
