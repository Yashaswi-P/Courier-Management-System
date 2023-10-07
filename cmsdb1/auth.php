<?php      
    include('dbconnection.php'); 
    require_once "session.php"; 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

      $user_id = $_POST['user'];  
    $password = $_POST['pass'];  
      $user_id = stripcslashes($user_id);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($dbcon, $user_id);  
        $password = mysqli_real_escape_string($dbcon, $password);  
      
    $qry ="select *from user_account where user_id = '$user_id' and password = '$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
?>
        <script>
            alert("Opps! plz Enter Your Username and Password again..");
            window.open('matrimont.php', '_self');
        </script> <?php
                } else {
                    $data = mysqli_fetch_assoc($run);
                    $uid = $data['user_id'];    //fetch id value of user
                    $email = $data['email_id'];
                    $_SESSION['uid'] = $uid;   //now we can use it until session destroy
                    $_SESSION['emm'] = $email;
                    ?>
        <script>
            alert("Welcome🙏");
            window.open('Home/Home_page.html', '_self');
            // changes made here
        </script> <?php

                }
            }
?>