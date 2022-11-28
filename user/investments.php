<?php
    require "config/initiate.php";
    require "php/index.php";
    include "sidebar/index.html";

    $id = $_SESSION['id'];

    $selecting = new Select($link);
    $selecting->more_details("WHERE user = ?, $id");
    $value = $selecting->pull('amount, package, date', 'investments');
    $selecting->reset();

    $data = $value[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <style>
        .welcome span{
            font-family: 'Poppins', sans-serif;
        }
        table{
            font-family: 'Open Sans', sans-serif;
            width: 95%;
        }
        td, th{
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        td{
            font-size: 15px;
        }
        tr:nth-child(even) {
            background-color: #f1f1f1;
        }

    </style>
    <title>Dashboard</title>
</head>
<body>
    <main>
        <!-- User profile -->
        <div class="container-fluid col-lg-9">
            <?php include "header/header.php"; ?>
            <h4 style="color: grey; font-family: 'montserrat', sans-serif; width: 95%; margin: auto;" class="pb-4">Investments</h4>

            <table class="mx-auto">
                <tr>
                    <th>Amount</th>
                    <th>Plan</th>
                    <th>Date</th>
                </tr>

                <?php if($value[1] < 1): ?>
                    <tr>
                        <td>None</td>
                        <td>None</td>
                        <td>None</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($data as $val): ?>
                        <tr>
                            <td><?= $val['amount']; ?></td>
                            <td><?= $val['package']; ?></td>
                            <td><?= $val['date']; ?></td>
                        </tr>
                    <?php endforeach; endif; ?>
            </table>

        </div>
    </main>
</body>
</html>