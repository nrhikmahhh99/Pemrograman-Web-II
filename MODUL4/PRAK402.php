<html>
    <head>
        <title>Data Nilai</title>
        <style>
            table{
                border-collapse: collapse;
            }
            th{
                text-align: left;
                background: #D0CECE;
            }
            th, td{
                width: 100px;
                padding-left: 5px;
                padding-bottom: 6px;
            }
            table, th, td{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Huruf</th>
            </tr>

            <?php
            $data=array(
                array(
                    "Nama" => "Andi",
                    "NIM" => "2101001",
                    "Nilai UTS" => 87,
                    "Nilai UAS" => 65
                ),
                array(
                    "Nama" => "Budi",
                    "NIM" => "2101002",
                    "Nilai UTS" => 76,
                    "Nilai UAS" => 79
                ),
                array(
                    "Nama" => "Tono",
                    "NIM" => "2101003",
                    "Nilai UTS" => 50,
                    "Nilai UAS" => 41
                ),
                array(
                    "Nama" => "Jessica",
                    "NIM" => "2101004",
                    "Nilai UTS" => 60,
                    "Nilai UAS" => 75
                )
            );

            function hitungNilaiHuruf($nilaiUts, $nilaiUas){
                $nilaiAkhir = (40/100 * $nilaiUts) + (60/100 * $nilaiUas);
                if($nilaiAkhir >= 80){
                    return "A";
                }elseif($nilaiAkhir >= 70 && $nilaiAkhir <= 79){
                    return "B";
                }elseif($nilaiAkhir >= 60 && $nilaiAkhir <= 69){
                    return "C";
                }elseif($nilaiAkhir >= 50 && $nilaiAkhir <= 59){
                    return "D";
                }else{
                    return "E";
                }
            }
            
            foreach($data as $key => $row){
                $nilaiAkhir = (40/100 * $row["Nilai UTS"]) + (60/100 * $row["Nilai UAS"]);
                $Huruf = hitungNilaiHuruf($row["Nilai UTS"], $row["Nilai UAS"]);
                $data[$key]["Nilai Akhir"] = $nilaiAkhir;
                $data[$key]["Huruf"] = $Huruf;
            }

            foreach($data as $row){
                echo "<tr>";
                echo "<td>{$row['Nama']}</td>";
                echo "<td>{$row['NIM']}</td>";
                echo "<td>{$row['Nilai UTS']}</td>";
                echo "<td>{$row['Nilai UAS']}</td>";
                echo "<td>{$row['Nilai Akhir']}</td>";
                echo "<td>{$row['Huruf']}</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>