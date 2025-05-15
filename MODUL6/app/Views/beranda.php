<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .profil-card {
            background-color: #fff9dd;
            width: 100%;
            max-width: 900px;
            padding: 50px 120px;
            border-radius: 10px;
            text-align: center;
            color: black;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
        .profil-img {
            width: 150px;
            height: 180px;
            border-radius: 50%;
            margin-bottom: 10px;
            object-fit: cover;
        }
    </style>
</head>
<body class="d-flex flex-column" style="height: 100vh;">
    <div class="container mt-3 mb-3">
        <h2 class="fw-bold">Beranda</h2>
    </div>
    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
        <a href="<?= base_url('/home/profil') ?>" style="text-decoration: none;">
            <div class="profil-card">
                <div class="text-center mb-4">
                    <img src="<?= base_url('upload_gambar/'.$profil['gambar']) ?>" class="profil-img shadow-lg" alt="Foto Profil">
                </div>
                <h4><?= $profil['nama'] ?></h4>
                <p>NIM. <?= $profil['nim'] ?></p>
            </div>
        </a>
    </div>
</body>
</html>