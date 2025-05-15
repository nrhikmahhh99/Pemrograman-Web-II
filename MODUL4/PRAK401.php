<html>
    <head>
        <title>Nilai Matriks</title>
        <style>
            table{
                border-collapse: collapse;
            }
            td{
                padding-right: 6px;
                padding-left: 6px;
                padding-bottom: 10px;
            }
            table, td{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <form method="post" action="" autocomplete="off">
            <label for="panjang">Panjang :</label>
            <input type="number" name="panjang" value="<?php echo isset($_POST['panjang']) ? $_POST['panjang'] : ''; ?>"><br>

            <label for="lebar">Lebar :</label>
            <input type="number" name="lebar" value="<?php echo isset($_POST['lebar']) ? $_POST['lebar'] : ''; ?>"><br>

            <label for="nilai">Nilai</label>
            <input type="text" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>"><br>

            <input type="submit" name="submit" value="Cetak">
        </form>

        <?php
        function cetakMatriks($panjang, $lebar, $nilai){
            $matriks = array_chunk(explode(' ', $nilai), $lebar);
            echo "<table>";
            
            for($i = 0; $i < $panjang; $i++){
                echo "<tr>";
                for($j = 0; $j < $lebar; $j++){
                    echo "<td>" . $matriks[$i][$j] . "</td>";
                }
            }
            echo "</tr>";
            echo "</table>";
        }

        if(isset($_POST['submit'])){
            $panjang = isset($_POST['panjang']) ? $_POST['panjang'] : 0;
            $lebar = isset($_POST['lebar']) ? $_POST['lebar'] : 0;
            $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : '';
            
            $jumlahNilai = count(explode(' ', $nilai));
            $ukuranMatriks = $panjang * $lebar;
    
            if($jumlahNilai !== $ukuranMatriks){
                echo "Panjang nilai tidak sesuai dengan ukuran matriks";
            }else{
                cetakMatriks($panjang, $lebar, $nilai);
            }
        }
        ?>
    </body>
</html>