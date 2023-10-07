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
    <header>
    <h1 align='center'>Vishnu Courier Service</h1>
    <div><h5 ><a href="index.php" style="float: right; margin-right:40px; color:blue; margin-top:0px">SignIn</a></h5></div>
        <div class="container" style="margin-top: 60px; width:50%;">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                    <h2 style="color: #273c75;">Verify The Following Details</h2>
                    <p style="color:#e84118;">To Reset Your Passwpword⮯⮯</p>
                    <form action="resetpswd.php" method="get">
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email"  placeholder="Enter emailId" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Verify" />  
                        </div>
                        <p style="color: #e84118;">Don't have an account?⮞➤ <a href="register.php">Register here</a>.</p>
                        
                    </form>
                </div>
            </div>
            </div>
        </div>  
    </header> 
    </body>
</html>

<?php

require_once "dbconnection.php";
// require_once "session.php";

if (isset($_REQUEST['submit'])) {

    $email = $_REQUEST['email'];

    $qryy= "SELECT * FROM `login` WHERE `email`='$email'";
    $run= mysqli_query($dbcon,$qryy);
    $row= mysqli_num_rows($run);
    if($row<1){
        ?>
        <script>alert("Opps! Email not matched..Try again or Create New One");
            window.open('resetpswd.php','_self');
        </script>   <?php
    }
    else{
        $data= mysqli_fetch_assoc($run);
        $id=$data['u_id'];
        session_start();
        $_SESSION['gid']=$id;
        
        ?>  <script>
              
            window.open('reset.php','_self');
            </script>
        <?php
        

    }
}
    
?>