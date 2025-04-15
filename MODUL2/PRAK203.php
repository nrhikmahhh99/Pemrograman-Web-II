<html>
<head>
  <title>Konversi Suhu</title>
  <style>
    .hasil {
      margin-top: 20px;
      font-weight: bold;
      font-size: 18px;
    }
  </style>
</head>
<body>
  <form method="post" class="form-box">
    <label>Nilai:
      <input type="number" name="nilai" step="any" required value="<?= isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : '' ?>">
    </label>
    <br>

    Dari:<br>
    <?php $dari = $_POST['dari'] ?? 'C'; ?>
    <input type="radio" name="dari" value="C" <?= $dari == 'C' ? 'checked' : '' ?>> Celcius<br>
    <input type="radio" name="dari" value="F" <?= $dari == 'F' ? 'checked' : '' ?>> Fahrenheit<br>
    <input type="radio" name="dari" value="Re" <?= $dari == 'Re' ? 'checked' : '' ?>> Rheamur<br>
    <input type="radio" name="dari" value="K" <?= $dari == 'K' ? 'checked' : '' ?>> Kelvin<br>

    Ke:<br>
    <?php $ke = $_POST['ke'] ?? 'F'; ?>
    <input type="radio" name="ke" value="C" <?= $ke == 'C' ? 'checked' : '' ?>> Celcius<br>
    <input type="radio" name="ke" value="F" <?= $ke == 'F' ? 'checked' : '' ?>> Fahrenheit<br>
    <input type="radio" name="ke" value="Re" <?= $ke == 'Re' ? 'checked' : '' ?>> Rheamur<br>
    <input type="radio" name="ke" value="K" <?= $ke == 'K' ? 'checked' : '' ?>> Kelvin<br>

    <button type="submit" name="konversi">Konversi</button>
  </form>

  <?php
  if (isset($_POST['konversi'])) {
    $nilai = floatval($_POST['nilai']);
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];

    switch ($dari) {
      case 'C': $celcius = $nilai; break;
      case 'F': $celcius = ($nilai - 32) * 5/9; break;
      case 'Re': $celcius = $nilai * 5/4; break;
      case 'K': $celcius = $nilai - 273.15; break;
      default: $celcius = 0;
    }

    switch ($ke) {
      case 'C': $hasil = $celcius; break;
      case 'F': $hasil = ($celcius * 9/5) + 32; break;
      case 'Re': $hasil = $celcius * 4/5; break;
      case 'K': $hasil = $celcius + 273.15; break;
      default: $hasil = 0;
    }

    $satuan = [
      'C' => '°C',
      'F' => '°F',
      'Re' => '°Re',
      'K' => 'K'
    ];
    echo "<div class='hasil'>Hasil Konversi: " . round($hasil, 1) . " " . $satuan[$ke] . "</div>";
  }
  ?>
</body>
</html>
