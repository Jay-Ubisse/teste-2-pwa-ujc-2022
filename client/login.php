<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
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
            margin: 5px 0;;
        }

        #login-status {
            background-color: lightgreen;;
            text-align: center;
        }

    </style>
</head>
<body>
    <h1>Iniciar Sessão</h1>
    <div id="login-status">
        <?php
        session_start();
        if (isset($_SESSION["login-status"])) {
            echo $_SESSION["login-status"];
            unset($_SESSION["login-status"]);
        }
        ?>
    </div>
    <form method="POST" action="../server/src/login.php">
        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>codigo</label>
            <input type="password" name="code">
        </div>

        <input type="submit" value="Entrar" >
        <p>Nao tem uma conta? <a href="./signup.php">Clique aqui</a> para se cadastrar</p>
    </form>
</body>
</html>