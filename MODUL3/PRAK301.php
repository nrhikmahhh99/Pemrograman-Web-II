<!DOCTYPE html>
<html>
<head>
    <title>Peserta</title>
    <style>
        .merah {
            color: red;
            font-weight: bold;
            font-size: 20px;
        }
        .hijau {
            color: green;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <form method="post">
        Jumlah Peserta : 
        <input type="number" name="jumlah" required value="<?php if (isset($_POST['jumlah'])) echo $_POST['jumlah']; ?>"><br>
        <input type="submit" value="Cetak">
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jumlah = $_POST["jumlah"];
        $i = 1;
        while ($i <= $jumlah) {
            if ($i % 2 == 1) {
                echo "<p class='merah'>Peserta ke-$i</p>";
            } else {
                echo "<p class='hijau'>Peserta ke-$i</p>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>
