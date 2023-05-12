<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <a href="./save-note.php">Registarar notas</a><a href="../server/src/logout.php">Sair</a>
        </div>
    </header>

    <?php
     require "../server/db_connect/db.php";
     $user = $_SESSION['user_id'];
     $sql = "SELECT * FROM teste_2.registos WHERE utilizador_id = '$user'";
     $result = $db->query($sql);
     
     if ($result->rowCount() == 0) {
         echo "Nenhuma nota";
     } else {
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo    "<tr>";
        echo   "<th>data</th>";
        echo   "<th>Notas</th>";
        echo   "<th>Local</th>";
        echo   "</tr>";

        foreach ($rows as $row) {
            echo "<tr>";
            echo  "<td>". $row['data'] . "</td>\n";
            echo  "<td>" . $row['notas'] . "</td>\n";
            echo  "<td>" . $row['local'] . "</td>\n";
            echo  "</tr>";
        }    
        echo "</table>";
     }

    ?>
</body>
</html>