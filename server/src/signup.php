<?php
 require "../db_connect/db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$code = $_POST['code'];

$sql = "INSERT INTO teste_2.utilizador (nome, email, codigo) VALUES (?, ?, ?)";

$stmt = $db->prepare($sql);
$stmt->execute([$name, $email, $code]);

if($stmt) {
    session_start();
    $_SESSION["signup-status"] = "Registrado com sucesso.";
    header("location: ../../client/signup.php");
}
?>