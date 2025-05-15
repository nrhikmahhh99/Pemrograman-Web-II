<!DOCTYPE html>
<html>
<head>
  <title>Ejaan Bilangan</title>
  <style>
    .hasil {
      margin-top: 20px;
      font-weight: bold;
      font-size: 18px;
    }
  </style>
</head>
<body>
        <form method = "post" action = "">
            <label for = "nilai">Nilai:</label>
            <input type = "number" name = "nilai"><br>
            <input type = "submit" name = "submit" value = "Konversi">
        </form>
        
        <?php
        if(isset($_POST['submit'])){
            $nilai = $_POST['nilai'];

            if($nilai == 0){
                $hasil = "Nol";
            } elseif($nilai >= 1 && $nilai < 10){
                $hasil = "Satuan";
            } elseif($nilai > 10 && $nilai < 20){
                $hasil = "Belasan";
            } elseif($nilai == 10){
                $hasil = "Puluhan";
            } elseif($nilai >= 20 && $nilai < 100){
                $hasil = "Puluhan";
            } elseif($nilai >= 100 && $nilai < 1000){
                $hasil = "Ratusan";
            } else{
                $hasil = "Anda Menginput Melebihi Bilangan";
            }
            echo "<h3>Hasil: $hasil</h3>";
        }
        ?>
    </body>
</html>