<?php
   session_start();
  if(!isset($_SESSION['email_mem'])){
    header("Location:loginpage.php");
  }
?>
<html lang="en">
<head>
    <title>insertpage</title>
</head>
<body>
    <form action="insertpage.php" method="POST">
        <div>
          <table>
            <tr>
                <td ><label >ชื่อ-นามสกุล: </label><input type="text" name="name_mem"  required></td>
                <td><label >E-mail: </label><input type="email" name="email_mem"  placeholder="user@ubru.ac.th" required></td>
            </tr>
            <tr>
                <td><label >รหัสผ่าน:</label><input type="text" name="password_mem"  required></td>
                <td><label>เพศ:</label>
                    <select name="sex_mem" >
                            <option value="1">ชาย</option>
                            <option value="2">หญิง</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label >วันเกิด:</label><input type="date" name="birthday_mem" required ></td>
                <td ><label >เบอร์โทรติดต่อ:</label><input type="text" name="phone_mem" placeholder="0881245614" required ></td>
            </tr>
            <tr>
                <td><label >ที่อยู่:</label><textarea  type="text" name="address_mem" rows="5" required> </textarea></td>
                <td ><label >รหัสไปรษณีย์:</label><input type="text" name="zipcode_mem" required ></td>
            </tr>
            <tr>
                <td><label >ประเทศ:</label><input type="text" name="country_mem" required></td>
            </tr>
            <tr>
            <td>
               <button type="submit" name="save" onclick="return confirm('ยืนยันการบันทึกข้อมูล')">บันทึก</button>
               <button type="button" onclick="location.href='searchpage.php'"> ยกเลิก</button>
            </td>
            </tr>
          </table>
        </div>
    </form>
    <?php
        
        if(isset($_POST['save'])){ 
            include 'dbconnect.php';
            $name_mem = trim($_POST['name_mem']);
            $email_mem = trim($_POST['email_mem']);
            $password_mem = trim($_POST['password_mem']);
            $sex_mem = $_POST['sex_mem'];
            $birthday_mem = $_POST['birthday_mem'];
            $phone_mem = trim($_POST['phone_mem']);
            $address_mem = trim($_POST['address_mem']);
            $zipcode_mem = trim($_POST['zipcode_mem']);
            $country_mem = trim($_POST['country_mem']);
            try {
                $sql = "INSERT INTO members (name_mem, email_mem, password_mem, 
                sex_mem, birthday_mem, phone_mem, address_mem, zipcode_mem, country_mem) 
                VALUES (:name_mem, :email_mem, :password_mem, :sex_mem, :birthday_mem, :phone_mem, :address_mem, :zipcode_mem, :country_mem)";
                $stmt = $con->prepare($sql);
                $stmt->bindparam(':name_mem', $name_mem);
                $stmt->bindparam(':email_mem', $email_mem);
                $stmt->bindparam(':password_mem', $password_mem);
                $stmt->bindparam(':sex_mem', $sex_mem);
                $stmt->bindparam(':birthday_mem', $birthday_mem);
                $stmt->bindparam(':phone_mem', $phone_mem);
                $stmt->bindparam(':address_mem', $address_mem);
                $stmt->bindparam(':zipcode_mem', $zipcode_mem);
                $stmt->bindparam(':country_mem', $country_mem);
                $stmt->execute();
                 if($stmt){
                        echo "<script>alert('บันทึกข้อมูลสำเร็จ')</script>";
                        echo "<script>location.replace('searchpage.php')</script>";
                 }else{
                        echo "<script>alert('เกิดข้อผิดพลาด')</script>";
                        echo "<script>window.history.back()</script>";
                 }  
            }
            catch(PDOException $e) {
                echo "<script>alert('เกิดข้อผิดพลาด')</script>";
                echo "<script>window.history.back()</script>";
            }
        }
    ?>
</body>
</html>
