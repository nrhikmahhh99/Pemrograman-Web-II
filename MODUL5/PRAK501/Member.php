<?php
require_once 'Model.php';
$koneksi = koneksiDB();
$members = getData($koneksi, 'member');

if(isset($_POST['delete'])){
    $result = deleteData($koneksi, 'member', 'id_member', $_POST['id_member']);
    header("Location: Member.php");
    exit;
}
?>

<html>
    <head>
        <title>Member</title>
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
                text-align: center;
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
    <body>
        <div class="container">
        <div class="table-header" style="display: flex; justify-content: space-between; align-items: center;">
            <button onclick="window.location.href='Dashboard.php'" style="padding: 5px 10px; background-color: #f673de; color: black; border: none; border-radius: 5px; font-size: 14px;">Kembali</button>
            <h3 style="flex-grow: 1; text-align: center; margin: 0;">DATA MEMBER</h3>
            <button class="add-button" onclick="window.location.href='FormMember.php'">Tambah Member</button>
        </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th width='90'>ID Member</th>
                            <th width='170'>Nama Member</th>
                            <th width='105'>Nomor Member</th>
                            <th width='170'>Alamat</th>
                            <th width='125'>Tanggal Mendaftar</th>
                            <th width='155'>Tanggal Terakhir Bayar</th>
                            <th width='100'>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($members as $member): ?>
                        <tr>
                            <td><?= $member['id_member']; ?></td>
                            <td><?= $member['nama_member']; ?></td>
                            <td><?= $member['nomor_member']; ?></td>
                            <td><?= $member['alamat']; ?></td>
                            <td><?= $member['tgl_mendaftar']; ?></td>
                            <td><?= $member['tgl_terakhir_bayar']; ?></td>
                            <td class="action-buttons" style="text-align: center;">
                                <a href="FormMember.php?id_member=<?= $member['id_member']; ?>" class="action-link">Edit</a>
                                <a href="#" onclick="submitDelete(<?= $member['id_member']; ?>)" class="action-link delete-link">Hapus</a>
                                <form id="delete-form-<?= $member['id_member']; ?>" method="post" style="display: none;">
                                    <input type="hidden" name="id_member" value="<?= $member['id_member']; ?>">
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
        <script>
            function submitDelete(id) {
                if (confirm('Yakin ingin menghapus data ini?')) {
                    document.getElementById('delete-form-' + id).submit();
                }
            }
        </script>
</html>