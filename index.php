<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/styles.css">
    <title>HoursDatabase</title>
</head>

<body>
    <?php
    include("./src/connection.php");
    ?>
    <h1>Banco de horas</h1>
    <form action="./src/forms/hours_database_form.php" method="POST" class="form">
        <label>Nome</label></br>
        <input type="text" name="name" id="name"></br>
        <label>Hora de entrada</label></br>
        <input type="time" name="journey_start" id="journey_start"></br>
        <label>Hora de saída</label></br>
        <input type="time" name="journey_end" id="journey_end"></br>
        <Button class="form_button" type="submit" name="submit" id="submit">
            Enviar
        </Button>
    </form>
</body>

</html>