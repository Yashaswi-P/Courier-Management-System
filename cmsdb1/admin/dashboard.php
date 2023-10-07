<!-- admin dashbord page with options for admin -->

<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
}else{
    header('location: ../login.php');
}

?>

<?php
include('head.php');
?>
<head>
<link rel="stylesheet" type="text/css" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
   
<div class="admintitle">
    <div>
    <h5 ><a href="../index.php" style="float: left; margin-left:20px; color:aliceblue;">LoginAsUser</a></h5>
    <h5 ><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;">LogOut</a></h5>
    </div>
    <h1 align='center' style="text-shadow: 0.1em 0.1em 0.15em #ffffff;">Welcome To Admin Dashbord</h1>
</div>
<div align="center" class="box">

<form >
    
    <!-- <a href="insertdata.php">Insert Data</a><br><br> -->

    <!-- <a href="updatedata.php">Update Data</a><br><br> -->
<label>Courier Details</label>
    <a href="deletedata.php">Service Data</a><br><br>
<label>Users Details</label>
    <a href="deleteusers.php">Users  Data</a><br><br>
</form>

</div>
</body>
</html>