<?php

session_start();


if (isset($_POST["btnOK1"]))
{
  //連線資料庫
  $link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());
  $result = mysqli_query($link, "set names utf8");  

  //執行SQL敘述
  
  // $name = $_POST["qqq"];
  $name = $_POST["txtUserName1"];
  $account = $_POST["txtUserName2"];
  $password = $_POST["txtPassword1"];
  $id = $_POST["txtUserName3"];
  $mail = $_POST["txtUserName4"];
  $phone = $_POST["txtUserName5"];
  $address =$_POST["txtUserName6"];


  $Text1 =<<<SqlQuery
  INSERT INTO member (name, account ,password ,id ,mail , phone ,address) 
  VALUES ('$name','$account','$password','$id', $mail, $phone, $address);
  SqlQuery;

  $result = mysqli_query ($link, $Text1);

}



 //重設
  if (isset($_POST["btnHome"]))
  {
    header("Location: index.php");//跳轉到首頁
    exit();
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form align="center" method = "post">

        <font face="link" color="#415FD9" size="7"><u><i>加入會員</i></u></font>
        
        
        <table  style="border:4px #FFD382 groove;" cellpadding="10" border='0' align="center">

        <td align="left" valign="baseline" bgcolor="FFD382" colspan="2">個人資料</td>
            
            <tr>
            <td width="150" align="left" valign="baseline"> <font face="link" color="#17160D" size="4" >．姓名</font></td>
            <td width="220" valign="baseline"><input type="text" name="txtUserName1" id="txtUserName1" size="30"/></td>
            </tr>

            <tr>
            <td width="150" align="left" valign="baseline"> <font face="link" color="#17160D" size="4">．會員帳號</font></td>
            <td width="220" valign="baseline" ><input type="text" name="txtUserName2" id="txtUserName2" size="30" /></td>
            </tr>


            <tr>
            <td width="150" align="left" valign="baseline"> <font face="link" color="#17160D" size="4">．會員密碼</font></td>
            <td width="220" valign="baseline"><input type="password" name="txtPassword1" id="txtPassword1" size="30"/></td>
            </tr>


            <tr>
            <td width="150" align="left" valign="baseline"> <font face="link" color="#17160D" size="4">．再次輸入密碼</font></td>
            <td width="220" valign="baseline"><input type="password" name="txtPassword2" id="txtPassword2" size="30" /></td>
            </tr>


            <tr>
            <td width="150" align="left" valign="baseline"> <font face="link" color="#17160D" size="4">．身分證號碼</font></td>
            <td width="220" valign="baseline"><input type="text" name="txtUserName3" id="txtUserName3" size="30" /></td>
            </tr>
            
            <td align="left" valign="baseline" bgcolor="FFD382" colspan="2" >聯絡資料 </td>

            <tr>
            <td width="150" align="left" valign="baseline"> <font face="link" color="#17160D" size="4">．E-mail</font></td>
            <td width="220" valign="baseline"><input type="text" name="txtUserName4" id="txtUserName4" size="30" /></td>
            </tr>


            <tr>
            <td width="150" align="left" valign="baseline"> <font face="link" color="#17160D" size="4">．聯絡電話</font></td>
            <td width="220" valign="baseline"><input type="text" name="txtUserName5" id="txtUserName5" size="30" /></td>
            </tr>


            <tr>
            <td width="150" align="left" valign="baseline"> <font face="link" color="#17160D" size="4">．通訊地址</font></td>
            <td width="220" valign="baseline"><input type="text" name="txtUserName6" id="txtUserName6" size="30" /></td>
            </tr>

            <tr>
                <td colspan="2" align="center" bgcolor="#A6D989">
                <input type="submit" name="btnOK1" id="btnOK1" value="註冊"/>
                <input type="reset" name="btnReset" id="btnReset" value="重填" />
                <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
            </td>
    </tr>

        </table>
        <!-- <div class="form-group">
            <label for="usr">姓名：</label>
            <input type="text" class="form-control" id="name">
        </div>

        <div class="form-group">
            <label for="pwd">會員帳號：</label>
            <input type="text" class="form-control" id="account">
        </div>

        <div class="form-group">
            <label for="pwd">會員密碼：</label>
            <input type="password" class="form-control" id="password">
        </div>

        <div class="form-group">
            <label for="pwd">再次輸入密碼：</label>
            <input type="password" class="form-control" id="password">
        </div>

        <div class="form-group">
            <label for="pwd">身分證號碼：</label>
            <input type="text" class="form-control" id="id">
        </div>

        <div class="form-group">
            <label for="E-mail">E-mail：</label>
            <input type="text" class="form-control" id="pwd">
        </div>

        <div class="form-group">
            <label for="pwd">聯絡電話：</label>
            <input type="text" class="form-control" id="pwd">
        </div> -->

        <!-- <div class="form-group">
            <label for="pwd">通訊地址：</label>
            <input type="text" class="form-control" id="pwd">
        </div> -->



</form>




    
</body>
</html>