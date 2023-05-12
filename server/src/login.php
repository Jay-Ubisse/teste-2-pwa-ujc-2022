<?php
 require "../db_connect/db.php";

$email = $_POST['email'];
$code = $_POST['code'];

$sql = "SELECT * FROM teste_2.utilizador WHERE email = '$email' AND codigo = '$code'";
$result = $db->query($sql);

if ($result->rowCount() == 0) {
    session_start();
    $_SESSION["login-status"] = "Email ou codigo invalido.";
    header("location: ../../client/login.php");
} else {
    session_start();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['name'] = $row['nome'];
    $_SESSION['email'] = $row['email'];
    header("Location: ../../client/save-note.php");
}

?>