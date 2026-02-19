<?php
    session_start();
    if(!isset($_SESSION['email_mem'])){
        header("Location:loginpage.php");
    }
    $row = NULL;
    if(isset($_POST['id_mem'])){
        include'dbconnect.php';
        $id_mem = trim($_POST['id_mem']);
        $stmt = $con->prepare('SELECT * FROM members WHERE id_mem = :id_mem'); 
        $stmt->execute(array(':id_mem'=>$id_mem));
        $row = $stmt->fetch();
    }
?>
<html lang="en">
<head>
    <title>editpage</title>
</head>
<body>
    <form action="editpage.php" method="POST">
        <div>
            <table>
                <tr>
                    <input type="hidden" name="id_mem" value="<?php echo $row['id_mem']; ?>">
                    <td><label >ชื่อ-นามสกุล: </label><input type="text" name="name_mem" value="<?php echo $row['name_mem'];?>" required></td>
                    <td><label >E-mail: </label><input type="email" name="email_mem" value="<?php echo $row['email_mem'];?>" placeholder="ponglert.s@ubru.ac.th" required></td>
                </tr>
                <tr>
                    <td><label >รหัสผ่าน:</label><input type="text" name="password_mem" value="<?php echo $row['password_mem'];?>" required></td>
                    <td><label>เพศ:</label>
                    <select name="sex_mem" >
                        <option value="1" <?php if($row['sex_mem'] == 1){ echo 'selected'; }?> >ชาย</option>
                        <option value="2" <?php if($row['sex_mem'] == 2){ echo 'selected'; }?> >หญิง</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td><label >วันเกิด:</label><input type="date" name="birthday_mem" value="<?php echo $row['birthday_mem'];?>" required></td>
                    <td ><label >เบอร์โทรติดต่อ:</label><input type="text" name="phone_mem" placeholder="0881245614" value="<?php echo $row['phone_mem'];?>" required></td>
                </tr>
                <tr>
                    <td><label >ที่อยู่:</label><textarea  type="text" name="address_mem" rows="5" required><?php echo $row['address_mem'];?></textarea></td>
                    <td ><label >รหัสไปรษณีย์:</label><input type="text" name="zipcode_mem" value="<?php echo $row['zipcode_mem'];?>" required ></td>
                </tr>
                <tr>
                    <td><label >ประเทศ:</label><input type="text" name="country_mem" value="<?php echo $row['country_mem'];?>" required></td>
                </tr>
                <tr>
                <td>
                    <button type="submit" name="save" onclick="return confirm('ยืนยันการบันทึกข้อมูล')">บันทึก</button>
                    <button type="submit" name="del" onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</button>
                    <button type="button" onclick="location.href='searchpage.php'"> ยกเลิก</button>
                </td>
                </tr>
            </table>
        </div>
    </form>
    <?php
        if(isset($_POST['save'])){ 
            include'dbconnect.php';
            $id_mem = trim($_POST['id_mem']);
            $name_mem = trim($_POST['name_mem']);
            $email_mem = trim($_POST['email_mem']);
            $password_mem = trim($_POST['password_mem']);
            $sex_mem = trim($_POST['sex_mem']);
            $birthday_mem = trim($_POST['birthday_mem']);
            $phone_mem = trim($_POST['phone_mem']);
            $address_mem = trim($_POST['address_mem']);
            $zipcode_mem = trim($_POST['zipcode_mem']);
            $country_mem = trim($_POST['country_mem']);
            try {
                $stmt=$con->prepare("UPDATE members SET name_mem=:name_mem,email_mem=:email_mem,
                password_mem=:password_mem,sex_mem=:sex_mem,birthday_mem=:birthday_mem,
                phone_mem=:phone_mem,address_mem=:address_mem,zipcode_mem=:zipcode_mem,
                country_mem=:country_mem WHERE id_mem=:id_mem");

                $stmt->execute(array('name_mem'=>$name_mem,':email_mem'=>$email_mem, 
                ':password_mem'=>$password_mem, ':sex_mem'=>$sex_mem, ':birthday_mem'=>$birthday_mem,
                ':phone_mem'=>$phone_mem, ':address_mem'=>$address_mem, ':zipcode_mem'=>$zipcode_mem,
                ':country_mem'=>$country_mem,':id_mem'=>$id_mem));

                if($stmt){
                   echo "<script>alert('แก้ไขข้อมูลสำเร็จ')</script>";
                   echo "<script>location.replace('searchpage.php')</script>";
                }
                else{
                  echo "<script>alert('เกิดข้อผิดพลาด')</script>";
                  echo "<script>window.history.back()</script>";
                }

            }
            catch(PDOException $e) {
                echo "<script>alert('เกิดข้อผิดพลาด')</script>";
                echo "<script>window.history.back()</script>";
            }
        }
        else if(isset($_POST['del'])){
            include'dbconnect.php';
            $id_mem = trim($_POST['id_mem']);
            $sql = "DELETE FROM members WHERE id_mem = '".$id_mem."' ";
            $stmt = $con->prepare($sql);
            try{
                $stmt->execute();
                echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
                echo "<script>location.replace('searchpage.php')</script>";
            }catch(PDOException $e){
                echo "ไม่สามารถลบข้อมูลได้".$e->getMassage;
            }
    }

    ?>
</body>
</html>
