<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            width: 30%;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
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
        form input[type="text"], form input[type="password"] {
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
            ;
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
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h3>Login</h3>
        </div>

        <div class="form-container">
            <?php if(session()->getFlashdata('error')): ?>
                <div style="color: red;">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if(isset($validation)): ?>
                <div class="error">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('/login') ?>" autocomplete="off">
                <?= csrf_field() ?>

                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <div class="button-container">
                    <input type="submit" name="login" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
