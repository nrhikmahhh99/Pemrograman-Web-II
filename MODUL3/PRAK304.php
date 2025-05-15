<html>
<head>
    <title>Jumlah Bintang</title>
</head>
<body>
    <form method="post">
        <?php
        $jumlah = 0;
        if (isset($_POST['submit'])) {
            $jumlah = intval($_POST['jumlah']);
        } elseif (isset($_POST['tambah'])) {
            $jumlah = intval($_POST['jumlah']) + 1;
        } elseif (isset($_POST['kurang'])) {
            $jumlah = intval($_POST['jumlah']) - 1;
            if ($jumlah < 0) $jumlah = 0;
        }
        ?>

        <?php if (!isset($_POST['submit']) && !isset($_POST['tambah']) && !isset($_POST['kurang'])): ?>
            Jumlah bintang: <input type="number" name="jumlah" required><br>
            <input type="submit" name="submit" value="Submit">
        <?php else: ?>
            <p>Jumlah bintang <?= $jumlah ?></p>
            <?php
            $gambar = "https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png";
            $i = 0;
            while ($i < $jumlah) {
                echo "<img src='$gambar' width='50'>";
                $i++;
            }
            ?>
            <br>
            <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
            <input type="submit" name="tambah" value="Tambah">
            <input type="submit" name="kurang" value="Kurang">
        <?php endif; ?>
    </form>
</body>
</html>
