<?php
require 'database.php';

$message = '';

if (!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
    $sql = "INSERT INTO usuarios (email, contrasena) VALUES (:correo, :contrasena)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $_POST['correo']);
    $password = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
      $stmt->bindParam(':contrasena', $_POST['contrasena']);


    if ($stmt->execute()) {
      $message = 'cuenta creada';
    } else {
      $message = 'ocurrio un error';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>registrar usuarios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>registrar usuarios</h1>
  

    <form action="signup.php" method="POST">
      <input name="correo" type="email" placeholder="nombre">
      <input name="contrasena" type="password" placeholder="contraseña">
      <input name="confirm_password" type="password" placeholder="Confirm contraseña">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
