<!DOCTYPE html>
<html>
<head>
  <title>Urutkan Nama</title>
</head>
<body>
  <form method="post">
    Nama: 1 <input type="text" name="nama1"><br>
    Nama: 2 <input type="text" name="nama2"><br>
    Nama: 3 <input type="text" name="nama3"><br>
    <button type="submit" name="urut">Urutkan</button>
  </form>

  <?php
  if (isset($_POST['urut'])) {
    $n1 = strtolower(trim($_POST['nama1']));
    $n2 = strtolower(trim($_POST['nama2']));
    $n3 = strtolower(trim($_POST['nama3']));

    $hasil = [];
    if ($n1 <= $n2 && $n1 <= $n3) {
      $hasil[] = $n1;
      if ($n2 <= $n3) {
        $hasil[] = $n2;
        $hasil[] = $n3;
      } else {
        $hasil[] = $n3;
        $hasil[] = $n2;
      }
    } elseif ($n2 <= $n1 && $n2 <= $n3) {
      $hasil[] = $n2;
      if ($n1 <= $n3) {
        $hasil[] = $n1;
        $hasil[] = $n3;
      } else {
        $hasil[] = $n3;
        $hasil[] = $n1;
      }
    } else {
      $hasil[] = $n3;
      if ($n1 <= $n2) {
        $hasil[] = $n1;
        $hasil[] = $n2;
      } else {
        $hasil[] = $n2;
        $hasil[] = $n1;
      }
    }

    echo "<br>";
    foreach ($hasil as $nama) {
      echo "<tr><td>" . htmlspecialchars($nama) . "</td></tr><br>";
    }
  }
  ?>
</body>
</html>
