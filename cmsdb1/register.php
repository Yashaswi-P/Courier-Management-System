<?php
require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $fullname = $_POST['name'];
    $phn = $_POST['ph'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if($password==$confirm_password){

    $qry = "INSERT INTO `users` (`email`, `name`, `pnumber`) VALUES ('$email', '$fullname', '$phn')";
    $run = mysqli_query($dbcon,$qry);
    
    if($run==true){

        $psqry = "INSERT INTO `login` (`email`, `password`, `u_id`) VALUES ('$email', '$password',LAST_INSERT_ID() )";
        $psrun = mysqli_query($dbcon,$psqry);
        ?>  <script>
            alert('Registration Successfully :)'); 
            window.open('index.php','_self');
            </script>
        <?php
    }
    }else{
        ?>  <script>
            alert('Password mismatched!!'); 
            </script>
        <?php
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
    <link rel="stylesheet" type="text/css" href="registerpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body><br>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                    <h2 style="color:green">Register</h2>
                    <p >Please fill this form to create an account.</p>
                    <!-- <?php echo $success; ?>
                    <?php echo $error; ?> -->
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Name" name="name" required>
                        </div>
                        <div class="form-group">
                            <input type="number"placeholder="Phone number" name="phone no" required>
                        </div>    
                        <div class="form-group">
                            <input type="email" placeholder="Email"name="email" required />
                        </div>    
                        <div class="form-group">
                            <input type="password" placeholder="Password"name="password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Confirm password"name="confirm_password"  required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger" value="Register">
                        </div>
                        <p>Already have an account? <a href="index.php" style="color: red;">Login here</a>.</p>
                    </form>
                </div>
            </div>
        </div>
            <hr><p>Notice: If the email Id is registered before, it will not respond.</p>
            <p>In this case, reset your password or register with different email Id....</p>
        </div>   
    </header> 
    </body>
</html>