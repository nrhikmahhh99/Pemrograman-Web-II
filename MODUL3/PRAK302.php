<html>
<head>
    <title>Segitiga Gambar</title>
</head>
<body>
    <form method="post">
        Tinggi : <input type="number" name="tinggi" required value="<?php if (isset($_POST['tinggi'])) echo $_POST['tinggi']; ?>"><br>
        Alamat Gambar : <input type="text" name="gambar" required value="<?php if (isset($_POST['gambar'])) echo $_POST['gambar']; ?>"><br>
        <input type="submit" value="Cetak">
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tinggi = intval($_POST["tinggi"]);
        $gambar = $_POST["gambar"];

        $i = 1;
        while ($i <= $tinggi) {
            $spasi = 1;
            while ($spasi < $i) {
                echo "<span style='display:inline-block; width:30px;'></span>";
                $spasi++;
            }
            $j = $tinggi;
            while ($j >= $i) {
                echo "<img src='$gambar' width='30'>";
                $j--;
            }
            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html>
