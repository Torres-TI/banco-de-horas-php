<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("../connection.php");
    $name = $_POST["name"];
    $hours = $_POST["createdAt"];

    $sql = "INSERT INTO teste(name, createdAt) VALUES ('$name', '$hours')";
    $result = $mysqli->query($sql);
    if ($result) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir os dados!";
    }
    $mysqli->close();
    ?>
</body>

</html>