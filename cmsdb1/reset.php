<?php

include('dbconnection.php');
session_start();
$gd = $_SESSION['gid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resetpswd.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body><br>
    <br>
    <br>
   
        <div class="box1" align="center">
        <form action="reset.php" method="POST">
                        <h2>Enter your new password</h2>
                    <input type="password" name="pass" placeholder="Enter new password"  required />
                     <input type="submit" name="submit" value="Update" />
        </div>
    </body>
</html>
<?php

if (isset($_POST['submit'])) {

    $password = $_POST['pass'];

    $qryd = "UPDATE `login` SET `password` = '$password' WHERE `u_id` = '$gd'";
    $run = mysqli_query($dbcon, $qryd);

    if ($run == true) {
        ?> <script>
            alert('Password Updated Successfully :)');
            window.open('logout.php', '_self');
            </script>
        <?php
    }
}
?>