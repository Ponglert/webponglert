<html lang="en">
    <head>
        <title>Ponglert</title>
    </head>
    <body>
        <form name= "frmRegis" method= "post" action= "from2.php">
            <input type="text" name="user" size="25" maxlength="25"> <br>
            <input type="password" name="Pwd" size="8" maxlength="8"> <br>
            <textarea type="text" name="address" cols="60" rows="5"></textarea> <br>
            <input type="radio" name="gender" value="meal"/>ชาย
            <input type="radio" name="gender" value="female"/>หญิง
            <br>
            <input type="checkbox" name="Hobby" value="อ่านหนังสือ"> อ่านหนังสือ
            <input type="checkbox" name=" Hobby " value="ดูทีวี"> ดูทีวี
            <select name="beverage">
            <option value="IcedTea" >ICED TEA </option>
            <option value="LemonTea"> LEMON TEA </option>
            <option value="COFF" >COFFEE </option>
            </select>
            <br>
            <input type= "submit" name="save" value= "Save">
            <input type= "reset" value= "Cancel">
        </form>
    </body>
</html>