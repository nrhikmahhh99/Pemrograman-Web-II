<!DOCTYPE html>
<html>
    <head>
        <title>Edit Buku</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background: linear-gradient(to bottom left,  #f6daf6, #f9d4f8, #f7c7f8, #f185ec, #f673e9);
                font-family: 'Georgia', sans-serif;
            }
            .container {
                width: 40%;
                background-color: white;
                border-radius: 12px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                padding: 20px;
            }
            .form-header {
                padding: 20px;
                background-color: #F7F7F7;
                border-bottom: 1px solid #E0E0E0;
                text-align: center;
            }
            .form-header h3 {
                margin: 0;
                font-size: 25px;
                color: black;
            }
            .form-container {
                padding: 20px;
            }
            form label {
                margin-bottom: 10px;
                display: block;
                font-size: 14px;
                font-weight: bold;
            }
            form input[type="text"], form input[type="number"] {
                width: 100%;
                margin-bottom: 20px;
                padding: 10px;
                border: 1px solid #CCCCCC;
                border-radius: 5px;
                box-sizing: border-box;
            }
            .button-container {
                text-align: center;
            }
            .button-container input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #ff00e1;
                border: none;
                border-radius: 5px;
                color: white;
                font-size: 16px;
            }
            .button-container input[type="submit"]:hover {
                background-color: #e15db9;
            }
            .error {
                color: red;
                font-size: 12px;
                margin-top: -15px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="form-header">
                <h3>Edit Data Buku</h3>
            </div>

            <div class="form-container">
                <form action="/buku/<?= $book['id'] ?>/update" method="post">
                    <?= csrf_field() ?>

                    <label>Judul</label>
                    <input type="text" name="judul" value="<?= set_value('judul', $book['judul']) ?>">
                    <?php if (isset($validation) && $validation->hasError('judul')): ?>
                        <div class="error"><?= $validation->getError('judul') ?></div>
                    <?php endif; ?>
                    
                    <label>Penulis</label>
                    <input type="text" name="penulis" value="<?= set_value('penulis', $book['penulis']) ?>">
                    <?php if (isset($validation) && $validation->hasError('penulis')): ?>
                        <div class="error"><?= $validation->getError('penulis') ?></div>
                    <?php endif; ?>
                
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" value="<?= set_value('penerbit', $book['penerbit']) ?>">
                    <?php if (isset($validation) && $validation->hasError('penerbit')): ?>
                        <div class="error"><?= $validation->getError('penerbit') ?></div>
                    <?php endif; ?>
                
                    <label>Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" value="<?= set_value('tahun_terbit', $book['tahun_terbit']) ?>">
                    <?php if (isset($validation) && $validation->hasError('tahun_terbit')): ?>
                        <div class="error"><?= $validation->getError('tahun_terbit') ?></div>
                    <?php endif; ?>
                
                    <div class="button-container">
                        <input type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>