<!DOCTYPE html>
<html>
    <head>
        <title>Data Buku</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                background: linear-gradient(to bottom left, #f6daf6, #f9d4f8, #f7c7f8, #f185ec, #f673e9);
                background-size: cover;
                background-position: center;
                font-family: 'Georgia', sans-serif;
                min-height: 100vh;
            }
            .navbar {
                width: 100%;
                display: flex;
                justify-content: flex-end;
                padding: 10px 20px 10px 0;
                background-color: white;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .navbar a {
                color:rgb(255, 0, 0);
                font-weight: bold;
                text-decoration: underline;
            }
            .container {
                width: 90%;
                max-width: 1200px;
                background-color: #FFFFFF;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                margin: 20px 0;
                padding: 20px;
            }
            .table-header {
                padding: 10px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #F7F7F7;
                border-bottom: 1px solid #E0E0E0;
            }
            .table-header h2 {
                margin: 0;
                font-size: 25px;
                color: black;
            }
            .table-header .add-button {
                padding: 5px 10px;
                background-color: #fc52d7;
                color: black;
                border: none;
                border-radius: 5px;
                font-size: 14px;
                text-decoration: none;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            table thead {
                background-color: #F7F7F7;
            }
            table th, table td {
                padding: 10px;
                text-align: center;
                border-right: 1px solid white;
                border-left: 1px solid white;
                border-bottom: 1px solid white;
                font-size: 14px;
            }
            table th {
                background-color: #E9ECEF;
                font-weight: bold;
                text-align: center;
            }
            table tbody tr:nth-child(even) {
                background-color: #F2F2F2;
            }
            .action-buttons {
                display: flex;
                gap: 10px;
            }
            .action-buttons a {
                text-decoration: none;
                color: #ff00e1;
                font-weight: bold;
            }
            .action-buttons form {
                display: inline;
            }
            .action-buttons form button {
                background: none;
                border: none;
                color: #ff00e1;
                font-weight: bold;
                cursor: pointer;
            }
            .btn-green {
                padding: 5px 10px;
                background-color: #5abd5d; /* hijau */
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 14px;
                text-decoration: none;
                cursor: pointer;
            }
            .btn-green:hover {
                background-color: #45a049;
            }
            .btn-red {
                padding: 5px 10px;
                background-color: #e61f11; /* merah */
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 14px;
                cursor: pointer;
            }
            .btn-red:hover {
                background-color: #d32f2f;
            }

        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="/logout">Logout</a>
        </div>

        <div class="container">
            <div class="table-header">
                <h2>Data Buku</h2>
                <a href="<?= base_url('buku/create') ?>" class="add-button">Tambah Data Baru</a>
            </div>

            <?php if (session()->getFlashdata('message')): ?>
                <div style="margin-top: 10px; background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 10px; border-radius: 5px;">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>

            <table class="table text-center">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if (!empty($buku)) : ?>
                    <?php foreach ($buku as $row) : ?>
                        <tr class="text-center">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $row['penulis'] ?></td>
                            <td><?= $row['penerbit'] ?></td>
                            <td><?= $row['tahun_terbit'] ?></td>
                            <td style="text-align: center;">
                                <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                      action="<?= base_url("buku/{$row['id']}/delete") ?>" method="post" style="display:inline-block">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="<?= base_url("buku/{$row['id']}/edit") ?>" class="btn-green" style="margin-right: 20px;">Edit</a>
                                    <button type="submit" class="btn-red">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6">No records found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <div style="margin-top: 15px; text-align: left;">
                <a href="<?= base_url('buku/resetId') ?>" class="add-button">🔄 Reset ID</a>
            </div>
        </div>
    </body>
</html>