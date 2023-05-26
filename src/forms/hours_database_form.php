<?php
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="../css/styles.css">
    <title>Form</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("../connection.php");
        // Get the values from the form
        $name = $_POST["name"];
        $start_journey = $_POST["journey_start"];
        $end_journey = $_POST["journey_end"];
        // Transform the values in DateTime
        $start_time = new DateTime($start_journey);
        $end_time = new DateTime($end_journey);
        //Transform hours in minutes
        $hours_start = (($start_time->format("H")) * 60) + ($start_time->format("i"));
        $hours_end = (($end_time->format("H")) * 60) + ($end_time->format("i"));
        $start_hours = $hours_start;
        $end_hours = $hours_end;
        //Check if the start time is bigger than the end time.
        if ($end_hours < $start_hours) {
            $end_hours += 1440;
        }
        //Check if the start time is between 22:00 and 05:00 am
        if ($start_hours > 1320 && $start_hours < 1740) {
            $night_time_start = $start_hours;
            $day_time_start = 0;
        } else {
            $day_time_start = $start_hours;
            $night_time_start = 0;
        }
        //Check if the end time is between 22:00 and 05:00
        if ($end_hours < 1740 && $end_hours > 1320) {
            $night_time_end = $end_hours;
            $day_time_end = 0;
        } else {
            $day_time_end = $end_hours;
            $night_time_end = 0;
        }
        //Check if the day time start is bigger than the day time end
        if ($day_time_end < $day_time_start) {
            $day_time_end += 1320;
        }
        //Check if the night time end is between 22:00 and 00:00
        if ($night_time_end > 1320 && $night_time_end < 1440) {
            $night_time_end -= 1320;
        }
        //Calculate the day and night period
        $day_period = $day_time_end - $day_time_start;
        $night_period = $night_time_end - $night_time_start;

        //Transform the day and night period in hours and minutes
        $day_period_hours = floor($day_period / 60);
        $day_period_minutes = $day_period % 60;
        $night_period_hours = floor($night_period / 60);
        $night_period_minutes = $night_period % 60;

        //Transform the day and night period in string formatted
        $total_day_period = $day_period_hours . ":" . $day_period_minutes;
        $total_night_period = $night_period_hours . ":" . $night_period_minutes;
    }
    $sql = "INSERT INTO users(name, journey_start, journey_end, result_day_period, result_night_period) 
    VALUES('$name', '$start_journey', '$end_journey', '$total_day_period', '$total_night_period')";
    $result = $mysqli->query($sql);
    if ($result) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir os dados!";
    }


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