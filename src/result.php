<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="./css/styles.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("./connection.php");
    $sql = "SELECT * FROM users";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Hora de entrada</th>";
        echo "<th>Hora de saída</th>";
        echo "<th>Período diurno</th>";
        echo "<th>Período noturno</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["journey_start"] . "</td>";
            echo "<td>" . $row["journey_end"] . "</td>";
            echo "<td>" . $row["result_day_period"] . "</td>";
            echo "<td>" . $row["result_night_period"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Não foram encontrados resultados.";
    }
    ?>
</body>

</html>