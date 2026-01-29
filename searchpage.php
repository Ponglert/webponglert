<?php
    session_start();
    if(!isset($_SESSION['email_mem'])){
            header("Location: loginpage.php");
    }
?>
<html lang="en">
<head>
  <title> searchpage</title>
</head>
<body>
    
    <form name= "frmmanagemem" method= "POST" action= "managemem.php">
        <label>E-mail: <?php echo $_SESSION['email_mem'] ?> </label> <br>
        <label>Name: <?php echo $_SESSION['name_mem'] ?> </label>  <br>
        <button type="button" name="logout" onclick="location.href='logout.php'">LogOut</button>
        <br>
    </form>
</body>
</html>
