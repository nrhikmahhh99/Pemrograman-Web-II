<!DOCTYPE html>
<html>
<head>
    <title>Program String</title>
</head>
<body>
    <form method="post">
        <input type="text" name="inputText" />
        <input type="submit" value="submit" />
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['inputText'];
        $length = strlen($input);
        $output = "";

        for ($i = 0; $i < $length; $i++) {
            $char = $input[$i];
            $output .= strtoupper($char) . str_repeat(strtolower($char), $length - 1);
        }
        echo "<h3>Input:</h3>";
        echo "<p>$input</p>";
        echo "<h3>Output:</h3>";
        echo "<p>$output</p>";
    }
    ?>
</body>
</html>
