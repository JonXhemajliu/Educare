<?php
include('../database/db.php');


// ENSURING THAT THE FORM IS SUBMITTED
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form data
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // HASHING THE PASSWORD
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // INSERTING DATA INTO THE DATABASE
    $sql = "INSERT INTO users(name,email,password)VALUES (?,?,?)";
    $stmtinsert = $pdo->prepare($sql);

    // EXECUTING 
    $result = $stmtinsert->execute([$firstname, $email, $hashed_password]);



    // Validate form inputs
    if (empty($firstname) || empty($email) || empty($password)) {
        echo "Error: One or more form fields are empty.";
    } else {
        header("Location: guest.php");
        exit;
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

    <title>Register</title>
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
                    <h2>Register</h2>
                    <form action="" method="POST">
                        <input type="text" placeholder="Full Name" required autofocus="" name="firstname">
                        <input type="email" placeholder="Email Address" required name="email">
                        <input type="password" placeholder="Create Password" required name="password">
                        <input type="password" placeholder="Confirm Password" required>

                        <button class="btn" type="submit">
                            Register
                        </button>
                    </form>
                    <p class="account">Already Have An Account? <a href="login.php">Log In</a></p>
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