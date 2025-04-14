<!DOCTYPE html>
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
  <label>Nilai : <input type="number" id="nilai"></label><br>

  Dari :<br>
  <input type="radio" name="dari" value="C" checked> Celcius<br>
  <input type="radio" name="dari" value="F"> Fahrenheit<br>
  <input type="radio" name="dari" value="Re"> Rheamur<br>
  <input type="radio" name="dari" value="K"> Kelvin<br>

  Ke :<br>
  <input type="radio" name="ke" value="C"> Celcius<br>
  <input type="radio" name="ke" value="F" checked> Fahrenheit<br>
  <input type="radio" name="ke" value="Re"> Rheamur<br>
  <input type="radio" name="ke" value="K"> Kelvin<br>

  <button onclick="konversi()">Konversi</button>

  <div class="hasil" id="hasilKonversi"></div>

  <script>
    function konversi() {
      let nilai = parseFloat(document.getElementById("nilai").value);
      let dari = document.querySelector('input[name="dari"]:checked').value;
      let ke = document.querySelector('input[name="ke"]:checked').value;
      let hasil = 0;

      // Konversi ke Celcius dulu sebagai titik tengah
      let celcius = 0;

      switch (dari) {
        case "C": celcius = nilai; break;
        case "F": celcius = (nilai - 32) * 5/9; break;
        case "Re": celcius = nilai * 5/4; break;
        case "K": celcius = nilai - 273.15; break;
      }

      // Dari Celcius ke target satuan
      switch (ke) {
        case "C": hasil = celcius; break;
        case "F": hasil = (celcius * 9/5) + 32; break;
        case "Re": hasil = celcius * 4/5; break;
        case "K": hasil = celcius + 273.15; break;
      }

      // Satuan akhir
      let satuan = {
        "C": "°C",
        "F": "°F",
        "Re": "°Re",
        "K": "K"
      };

      document.getElementById("hasilKonversi").innerHTML =
        "Hasil Konversi: " + hasil.toFixed(1) + " " + satuan[ke];
    }
  </script>

</body>
</html>
