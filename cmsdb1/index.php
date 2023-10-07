<?php

require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
?>
        <script>
            alert("Opps! plz Enter Your Username and Password again..");
            window.open('index.php', '_self');
        </script> <?php
                } else {
                    $data = mysqli_fetch_assoc($run);
                    $id = $data['u_id'];    //fetch id value of user
                    $email = $data['email'];
                    $_SESSION['uid'] = $id;   //now we can use it until session destroy
                    $_SESSION['emm'] = $email;
                    ?>
        <script>
            alert("Welcome🙏");
            window.open('home/home.php', '_self');
            // changes made here
        </script> <?php

                }
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="indexpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <h1 align='center'><i class="fa fa-truck"></i>Vishnu Courier Service</h1>
        <hr />
        <P align='center' style="font-weight: bold;color:rgb(220, 151, 230);font-family:'Times New Roman', Times, serif">The Fastest Courier Service Ever</P>
        <div>
            <h5><a href="admin/adminlogin.php" >AdminLogin</a></h5>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="box">
                    <h2 style="color: #273c75;text-align: center">Login</h2>
                    <!-- <?php echo $error; ?> -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter username/emailId" required />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="SignIn" />
                            <button onclick="window.location.href='resetpswd.php'" class="btn btn-danger" style="cursor:pointer">Forgot password</button>
                        </div>
                        <span style="color: #e84118">Don't have an account?⮞➤ <a href="register.php">Register here</a>.</span>
                    </div>
                    </form>
        
                </div>
            </div>
        </div>
        <header>
    
</body>
</html>