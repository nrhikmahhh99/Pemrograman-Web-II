<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone Samsung</title>
    <style>
        table {
            width: 315px;
            border-collapse: separate;
            border-spacing: 3px;
            border: 1px double black;
        }
        th, td {
            border: 1px solid black;
            padding: 3px;
            text-align: left;
        }
        th {
            font-weight: bold;
            background-color: #FF0000;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    $samsung = ["S22" => "Samsung Galaxy S22", "S22+" => "Samsung Galaxy S22+", "A03" => "Samsung Galaxy A03", "Xcover 5" => "Samsung Galaxy Xcover 5"];
    ?>
    <table>
        <tr>
            <th><h2>Daftar Smartphone Samsung</h2></th>
        </tr>
        <?php
        foreach ($samsung as $phone) :
        ?>
        <tr>
            <td> <?= $phone; ?> </td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>
