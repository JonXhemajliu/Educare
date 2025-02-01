<?php
require_once('../database/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['name']) && isset($_POST['password'])) {
    $inputUsername = $_POST['name'];
    $inputPassword = $_POST['password'];

    // FETCHING USER FROM DATABASE
    $stmt = $pdo->prepare("SELECT * FROM users WHERE name =?");
    $stmt->execute([$inputUsername]);
    $user = $stmt->fetch();

    if ($user && password_verify($inputPassword, $user['password'])) {
      echo 'Password is correct.<br>';
      session_start();
      $_SESSION['user'] = $user['name'];
      header("Location: ../admin/admin.php");
      exit;
    } else {
      echo 'Login Failed - Incorrect password.<br>';
    }
  }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bring.css" />
  <link rel="stylesheet" href="../css/style.css" />

  <!--Google Links-->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://font.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

  <title>School Registration</title>
</head>

<body>

  <!-- Navigation  -->
  <?php include('navigation.php'); ?>
  <!-- -->

  <br />
  <br />
  <br />
  <br />
  <br />
  <br />

  <div class="login-form">
    <div class="container">
      <div class="main">
        <div class="content">
          <h2>Log In </h2>
          <form action="" method="POST">
            <input type="text" placeholder="User Name" name="name" required autofocus="">
            <input type="password" placeholder="User Password" name="password" required autofocus="">

            <button class="btn" type="submit">login</button>
          </form>
          <p class="account">Don't Have An Account ? <a href="register.php">Register</a></p>
        </div>
      </div>
    </div>
  </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>



  <!--Footer-->
  <?php include('footer.php') ?>
  <!-- -->

</body>

</html>