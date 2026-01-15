<html lang="en">
    <head>
        <title>from2</title>
    </head>
    <body>
        
        <?php
            if(isset($_POST['save'])){
                $user = $_POST['user'];
                $pwd = $_POST['Pwd'];
                $address = $_POST['address'];
                $gender = $_POST['gender'];
                $beverage = $_POST['beverage'];
                echo "$user <br>";
                echo "$pwd <br>";
                echo "$address <br>";
                echo "$gender <br>";
                echo "$beverage <br>";
            }
            else{
                echo "You didn't press save.";
            }
        ?>
        <form name= "frmRegis" method= "post" action= "from1.php">
            <input type= "submit" value= "Back">
        </form>
    </body>
</html>