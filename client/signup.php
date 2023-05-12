<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
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
            margin: 5px 0;
            ;
        }

        #login-status {
            background-color: lightgreen;;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Cadastrar</h1>
    <div id="login-status">
        <?php
        session_start();
        if (isset($_SESSION["signup-status"])) {
            echo $_SESSION["signup-status"];
            unset($_SESSION["signup-status"]);
        }
        ?>
    </div>
    <form method="POST" action="../server/src/signup.php">
        <div>
            <label>Nome</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>Codigo</label>
            <input type="password" name="code">
        </div>

        <input type="submit" value="Entrar">
        <p>Ja tem uma conta? <a href="./login.php">Clique aqui</a> para entrar</p>
    </form>
</body>

</html>