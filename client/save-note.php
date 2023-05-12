<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        header {
            display: flex;
            justify-content: space-between;
            padding: 3px 20px;
            background-color: lightgray;
        }
        h1 {
            background-color: lightgray;
            padding: 10px 5px;
            text-align: center;
        }

        form {
            margin: 30px auto;
            width: 50%;
            background-color: cornflowerblue;
            border-radius: 20px;
            padding: 15px;
        }

        div {
            margin: 5px 0;
            ;
        }

        #login-status {
            background-color: lightgreen;;
            text-align: center;
        }

        #logout a {
            color: while;
            margin-left: 20px;
            text-decoration: none;
            font-size: medium;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <h1><?php echo $_SESSION['name'] ?></h1>
        </div>
        <div id="logout">
            <a href="./view-notes.php">Visualizar Registros</a><a href="../server/src/logout.php">Sair</a>
        </div>
    </header>
    
    <div>
        <h2>Guardar Registro</h2>
        <form method="POST" action="./save-note.php">
            <div>
            <label>Data</label>
            <input type="date" name="data" required >
            </div>
            <div>
                <label>Notas</label>
                <input type="text" name="notas" required >
            </div>
            <div>
                <label>Local</label>
                <input type="text" name="local" required >
            </div>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>

<?php
require "../server/db_connect/db.php";

if (isset($_POST["data"]) AND isset($_POST["notas"]) AND isset($_POST["local"])) {
    $date = $_POST["data"];
    $notes = $_POST["notas"];
    $local = $_POST["local"];

    $sql = "INSERT INTO teste_2.registos (data, notas, local, utilizador_id) VALUES (?, ?, ?, ?)";

    $statement = $db->prepare($sql);
    $statement->execute([$date, $notes, $local, $_SESSION['user_id']]);

    if($statement) {
        echo "Notas guardadas com sucesso. \n";
    }

}

?>
</html>