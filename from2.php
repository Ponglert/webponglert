<html lang="en">
    <head>
        <title>from2</title>
    </head>
    <body>
        <?php
            if(isset($_POST['save'])){
                $user = $_POST['user'];
                $pwd = $_POST['Pwd'];
                echo "$user <br>";
                echo "$pwd <br>";
            }
            else{
                echo "You didn't press save.";
            }
        ?>
    </body>
</html>