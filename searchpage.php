<?php
    session_start();
    if(!isset($_SESSION['email_mem'])){
        header("Location: loginpage.php");
    }
?>
<html lang="en">
    <head>
        <title>searchpage</title>
    </head>
    <body>
        <form name= "frmsearch" action="searchpage.php" method="post" role="search">
            <div>
            <input type="text" name="search" placeholder="ค้นหาจากชื่อ-นามสกุล">
            <span>
                <button type="submit"> ค้นหา</button>
            </span>
            </div>
        </form>
        <div>
            <label>ยินดีต้อนรับ: <?php echo $_SESSION['name_mem'] ?> </label> <br>
            <button type="button" onclick="location.href='insertpage.php'" >เพิ่มข้อมูล</button>
            <button type="button" onclick="location.href='logout.php'" >ออกจากระบบ</button>
        </div><br>
        <div class="center">
            <table border="1">
                <thead>
                <tr>
                <th class="text-center">ID ผู้ใช้</th>
                <th class="text-center">ชื่อ-นามสกุล</th>
                <th class="text-center">เพศ</th>
                <th class="text-center">เบอร์โทร</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include'dbconnect.php';
                if(isset($_POST['search'])){
                    $search = $_POST['search'];
                    $stmt=$con->prepare("SELECT * from members WHERE name_mem LIKE :A1");
                    $wordlike = '%'.$search.'%';
                    $stmt -> bindParam(':A1',$wordlike);
                    $stmt->execute();
                }else{
                    $stmt=$con->prepare("SELECT * FROM members ORDER BY name_mem ASC");
                    $stmt->execute();
                }
                while($row = $stmt -> fetch()){
                ?>
                    <tr>
                    <td><?php echo $row['id_mem'];?></td>
                    <td><?php echo $row['name_mem'];?></td>
                    <td>
                        <?php
                    if($row['sex_mem'] == 1){ echo "ชาย"; }
                    else { echo "หญิง"; }
                    ?>
                    </td>
                    <td><?php echo $row['phone_mem'];?></td>
                    <td><?php echo $row['email_mem'];?></td>
                    <td class="text-center"><a button href="editpage.php?id=<?php echo
                    $row['id_mem']?>"> แก้ไข</button></a>
                    </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
