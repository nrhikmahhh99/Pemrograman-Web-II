<html>
    <head>
        <title>Input Nama, NIM dan Jenis Kelamin</title>
        <style>
            .error-message{
                color: red;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <form method = "post" action = "">
            <label for = "nama">Nama:</label>
            <input type = "text" name = "nama"><span style="color: red">*</span>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['nama'])):
            ?>
              <span class = "error-message">nama tidak boleh kosong</span>
            <?php
            endif;
            ?>
            <br>

            <label for = "nim">Nim:</label>
            <input type = "text" name = "nim"><span style="color: red">*</span>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['nim'])):
            ?>
              <span class = "error-message">nim tidak boleh kosong</span>
            <?php
            endif;
            ?>
            <br>

            <label for = "jenisKelamin">Jenis Kelamin:<span style="color: red">*</span></label>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['jenisKelamin'])):
            ?>
              <span class = "error-message">jenis kelamin tidak boleh kosong</span>
            <?php
            endif;
            ?>
            <br>

            <input type = "radio" id = "laki" name = "jenisKelamin" value = "Laki-Laki">
            <label for = "laki">Laki-Laki</label><br>
            <input type = "radio" id = "perempuan" name = "jenisKelamin" value = "Perempuan">
            <label for = "perempuan">Perempuan</label><br>
            <input type = "submit" name = "submit" value = "Submit">
        </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nama']) && !empty($_POST['nim']) && !empty($_POST['jenisKelamin'])){
                    $nama = $_POST['nama'];
                    $nim = $_POST['nim'];
                    $jenisKelamin = $_POST['jenisKelamin'];
                
                    echo "$nama<br>";
                    echo "$nim<br>";
                    echo "$jenisKelamin";
                }
            ?>
    </body>
</html>