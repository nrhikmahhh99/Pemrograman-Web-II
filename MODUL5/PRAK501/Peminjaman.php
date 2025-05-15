<?php
require_once 'Model.php';
$koneksi = koneksiDB();
$loans = getPeminjamanLengkap($koneksi);

if(isset($_POST['delete'])){
    $result = deleteData($koneksi, 'peminjaman', 'id_peminjaman', $_POST['id_peminjaman']);
    header("Location: Peminjaman.php");
    exit;
}
?>

<html>
    <head>
        <title>Data Peminjaman</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                background: linear-gradient(to bottom left, #f6daf6, #ffdefe, #f7c7f8, #f185ec, #f673e9);
                background-size: cover;
                background-position: center;
                font-family: 'Georgia', sans-serif;
            }
            .container{
                width: 90%;
                background-color: #FFFFFF;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
            .table-header{
                padding: 10px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #F7F7F7;
                border-bottom: 1px solid #E0E0E0;
            }
            .table-header h3{
                margin-top: 20px;
                margin-bottom: 20px;
                text-align: left;
                font-size: 25px;
                color: black;
            }
            .table-header .add-button{
                padding: 5px 10px;
                background-color: #f673de;
                color: black;
                border: none;
                border-radius: 5px;
                font-size: 14px;
            }
            .table-container{
                padding: 20px;
            }
            table{
                width: 100%;
                border-collapse: collapse;
            }
            table thead{
                background-color: #F7F7F7;
            }
            table th, table td{
                padding: 10px;
                text-align: left;
                border-right: 1px solid white;
                border-left: 1px solid white;
                border-bottom: 1px solid white;
                font-size: 14px;
                text-align: center;
            }
            table th{
                background-color: #E9ECEF;
                font-weight: bold;
            }
            table tbody tr:nth-child(even){
                background-color: #F2F2F2;
            }
            .action-buttons {
                display: flex;
                justify-content: center;
                gap: 15px;
                align-items: center;
            }
            .action-link {
                text-decoration: none;
                color: #ff00e1;
                font-weight: bold;
                font-family: inherit;
                font-size: 14px;
                background: none;
                border: none;
                cursor: pointer;
                padding: 0;
                margin: 0;
                line-height: 1;
                vertical-align: middle;
            }
            .delete-link:hover,
            .action-link:hover {
                text-decoration: underline;
                color: #d81b60;
            }
            .action-buttons form{
                display: inline;
            }
        </style>
    </head>

    <script>
    function submitDelete(id) {
        if (confirm("Yakin ingin menghapus data ini?")) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
    </script>

    <body>
        <div class="container">
        <div class="table-header" style="display: flex; justify-content: space-between; align-items: center;">
            <button onclick="window.location.href='Dashboard.php'" style="padding: 5px 10px; background-color: #f673de; color: black; border: none; border-radius: 5px; font-size: 14px;">Kembali</button>
            <h3 style="flex-grow: 1; text-align: center; margin: 0;">DATA PEMINJAMAN</h3>
            <button class="add-button" onclick="window.location.href='FormPeminjaman.php'">Tambah Pinjaman</button>
        </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID Peminjaman</th>
                            <th>Nama Member</th>
                            <th>ID Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th width='100'>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($loans as $loan): ?>
                        <tr>
                            <td><?= $loan['id_peminjaman']; ?></td>
                            <td><?= $loan['nama_member']; ?></td>
                            <td><?= $loan['id_buku']; ?></td>
                            <td><?= $loan['judul_buku']; ?></td>
                            <td><?= $loan['tgl_pinjam']; ?></td>
                            <td><?= $loan['tgl_kembali']; ?></td>
                            <td class="action-buttons" style="text-align: center;">
                                <a href="FormPeminjaman.php?id_peminjaman=<?= $loan['id_peminjaman']; ?>" class="action-link">Edit</a>
                                <a href="#" onclick="submitDelete(<?= $loan['id_peminjaman']; ?>)" class="action-link delete-link">Hapus</a>
                                <form id="delete-form-<?= $loan['id_peminjaman']; ?>" method="post" style="display: none;">
                                    <input type="hidden" name="id_peminjaman" value="<?= $loan['id_peminjaman']; ?>">
                                    <input type="hidden" name="delete" value="1">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>