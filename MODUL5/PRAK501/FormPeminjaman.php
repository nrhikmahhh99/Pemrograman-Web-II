<?php
require_once 'Model.php';
$koneksi = koneksiDB();
$members = getData($koneksi, 'member');
$books = getData($koneksi, 'buku');

$message = '';
$loan = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['menambahkan'])) {
        if (isset($_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali'])) {
            $id_peminjaman = generateId($koneksi, 'peminjaman', 'id_peminjaman');
            $dataPeminjaman = [
                'id_peminjaman' => $id_peminjaman,
                'id_member' => $_POST['id_member'],
                'id_buku' => $_POST['id_buku'],
                'tgl_pinjam' => $_POST['tgl_pinjam'],
                'tgl_kembali' => $_POST['tgl_kembali']
            ];
            $result = insertData($koneksi, 'peminjaman', $dataPeminjaman);
            header("Location: Peminjaman.php");
            exit;
        }
    }

    if (isset($_POST['mengubah'])) {
        if (isset($_POST['id_peminjaman'], $_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali'])) {
            $dataPeminjaman = [
                'id_member' => $_POST['id_member'],
                'id_buku' => $_POST['id_buku'],
                'tgl_pinjam' => $_POST['tgl_pinjam'],
                'tgl_kembali' => $_POST['tgl_kembali']
            ];
            $result = updateData($koneksi, 'peminjaman', $dataPeminjaman, 'id_peminjaman', $_POST['id_peminjaman']);
            header("Location: Peminjaman.php");
            exit;
        }
    }
}

if(isset($_GET['id_peminjaman'])){
    $peminjaman_id = $_GET['id_peminjaman'];
    $loan = getById($koneksi, 'peminjaman', 'id_peminjaman', $peminjaman_id);
}
?>

<html>
    <head>
        <title>Form Peminjaman</title>
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
                width: 60%;
                background-color: white;
                border-radius: 12px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
            .form-header{
                padding: 10px 20px;
                align-items: center;
                background-color: #F7F7F7;
                border-bottom: 1px solid #E0E0E0;
            }
            .form-header h3{
                margin-top: 20px;
                margin-bottom: 20px;
                text-align: left;
                font-size: 25px;
                color: black;
            }
            .form-container{
                padding: 20px;
            }
            form label{
                margin-bottom: 10px;
                display: block;
                font-size: 14px;
                font-weight: bold;
            }
            form input[type="date"],
            form select {
                width: 100%;
                padding: 12px;
                margin-bottom: 25px;
                border: 1px solid #ccc;
                border-radius: 6px;
                box-sizing: border-box;
                font-size: 15px;
            }
            .button-container{
                display: flex;
                justify-content: space-between;
            }
            .button-container input[type="submit"]{
                width: 49%;
                margin-bottom: 0;
                padding: 10px;
                background-color: #f673f6;
                border: 1px solid #CCCCCC;
                border-radius: 5px;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <div class="form-header" style="display: flex; justify-content: space-between; align-items: center;">
            <button onclick="window.location.href='Peminjaman.php'" style="padding: 5px 10px; background-color: #f673f6; color: black; border: none; border-radius: 5px; font-size: 14px;">Kembali</button>
            <h3 style="flex-grow: 1; text-align: center; margin: 0;">KELOLA DATA PEMINJAMAN</h3>
            <div style="width: 80px;"></div> <!-- Spacer agar tombol Kembali dan judul tetap simetris -->
        </div>
            <div class="form-container">
                <form method="post" action="" autocomplete="off">
                    <?php if (isset($loan['id_peminjaman'])): ?>
                        <input type="hidden" name="id_peminjaman" value="<?php echo $loan['id_peminjaman']; ?>">
                    <?php endif; ?>

                    <label for="id_member">Nama Member</label>
                    <select name="id_member" id="id_member" required>
                        <option value="">-- Pilih Member --</option>
                        <?php foreach($members as $m): ?>
                            <option value="<?php echo $m['id_member']; ?>" <?php if(isset($loan['id_member']) && $loan['id_member'] == $m['id_member']) echo 'selected'; ?>>
                                <?php echo $m['nama_member']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <label for="id_buku">Judul Buku</label>
                    <select name="id_buku" id="id_buku" required>
                        <option value="">-- Pilih Buku --</option>
                        <?php foreach($books as $b): ?>
                            <option value="<?php echo $b['id_buku']; ?>" <?php if(isset($loan['id_buku']) && $loan['id_buku'] == $b['id_buku']) echo 'selected'; ?>>
                                <?php echo $b['judul_buku']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo isset($loan['tgl_pinjam']) ? $loan['tgl_pinjam'] : date('Y-m-d'); ?>" required>

                    <label for="tgl_kembali">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" value="<?php echo isset($loan['tgl_kembali']) ? $loan['tgl_kembali'] : date('Y-m-d'); ?>" required>

                    <div class="button-container">
                        <input type="submit" name="menambahkan" value="Tambah">
                        <input type="submit" name="mengubah" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>