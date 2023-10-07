<!-- admin logIn page and login logic -->
<?php

session_start();
if (isset($_SESSION['uid'])) {

    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrimonial Website landing page design html css</title>
    <link rel="stylesheet" type="text/css" href="adminlogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <nav>
        <div align='center'class="logo">
            <i class="fa fa-truck"></i>Vishnu Courier Service
        </div>
    </nav>
    <header ><div class="box" >
        <h1 align='center'>Admin Login</h1>
        <form action="adminlogin.php" method="POST" style="margin: auto;">
              <label>Email_ID</label>
                    <input type="email" name="uname" placeholder="Email ID" require>
              <label>Password</label>
                    <input type="password" name="pass" placeholder="Password" require>
                     <input type="submit" name="login" value="Login" >
                     <a href="../index.php">BackToHome</a>
        </form>
    </div>
    </header>
    </body>
</html>

<?php

include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
        <script>
            alert("Only admin can login..");
            window.open('adminlogin.php', '_self');
        </script><?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>