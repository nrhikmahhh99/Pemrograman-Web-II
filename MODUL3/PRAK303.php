<html>
<head>
    <title>Deret dan Bintang</title>
</head>
<body>
    <form method="post">
        Batas Bawah : <input type="number" name="bawah" required value="<?php if (isset($_POST['bawah'])) echo $_POST['bawah']; ?>"><br>
        Batas Atas  : <input type="number" name="atas" required value="<?php if (isset($_POST['atas'])) echo $_POST['atas']; ?>"><br>
        <input type="submit" value="Cetak">
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bawah = intval($_POST["bawah"]);
        $atas  = intval($_POST["atas"]);
        $i = $bawah;
        $bintang = "https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png";

        echo "<div style='font-size:20px;'>";

        do {
            if ((($i + 7) % 5) == 0) {
                echo "<img src='$bintang' width='20' height='20' style='margin-right:5px;'>";
            } else {
                echo "$i ";
            }
            $i++;
        } while ($i <= $atas);

        echo "</div>";
    }
    ?>

</body>
</html>
