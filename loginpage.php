<html lang="en">
<head>
    <title>loginpage</title>
</head>
<body>
    <form name= "frmpage" action="loginpage.php" method="POST">
        <input type="email" name="email_mem" size="50" placeholder="อีเมล์" required> <br>
        <input type="password" name="password_mem" size="50" placeholder="รหัสผ่าน" required> <br>
        <input type= "submit" name="submit" value= "Login" >
        <br>
    </form>
    
    <?php
        include ('dbconnect.php');
        session_start();
        if (isset($_POST['submit'])) {
            if(isset($_POST['email_mem']) && isset($_POST['password_mem'])){
                $email_mem = trim($_POST['email_mem']);
                $password_mem = trim($_POST['password_mem']);
                try{        
                    $stmt = $con -> prepare("SELECT * FROM members WHERE   email_mem = '".$email_mem."' AND password_mem = '".$password_mem."'");
                    $stmt -> execute();
                    $em = $stmt -> fetch(); 
                    if ($em == true){
                        $_SESSION["id_mem"] = $em['id_mem'];
                        $_SESSION["name_mem"] = $em['name_mem'];
                        $_SESSION["email_mem"] = $em['email_mem'];
                        echo "<script>alert('ยินดีต้อนรับเข้าสู่ระบบ');</script>";
                        echo "<script>location.replace('searchpage.php')</script>";
                    }
                    else {
                        echo "<script>alert('กรุณาใส่ E-mail และ Password ให้ถูกต้อง');</script>";
                        echo "<script>location.replace('loginpage.php')</script>";
                    }
                } catch ( Exception $e){
                    $e ->getMessage();
                }
            }
        }
    ?>

</body>
</html>
