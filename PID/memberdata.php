<?php

session_start();
$link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());  
$result = mysqli_query($link, "set names utf8");   

$nameID =  $_SESSION["memberID"];

if (isset($_POST["gg"]))
{
    
    $Text5 =<<<SqlQuery
    update member set limitvx = 'X' where memberId = '$nameID';
    SqlQuery;        
    $result = mysqli_query ($link, $Text5); 
}         

if (isset($_SESSION["account"]))
$account = $_SESSION["account"];
else 
$account = "";


//執行SQL敘述   
$Text5 =<<<SqlQuery
SELECT memberID,name ,account, mail, phone, address ,limitvx FROM member where Authority ='0';
SqlQuery;            
$result = mysqli_query($link, $Text5);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <form  method ="post" >

            <div class = "custom-control">           
                  <font face="link" color="#415FD9" size="7"><u><i>購物網</i></u></font>                     
                  <input name="okbutton2" type="submit" class="btn btn-outline-info" value ="管理員登出"/><br>                        
                  <font face="link" color="#D14571" size="5"><?php echo "管理員：".$account?></font><br>                               
                  <input name="okbutton8" type="submit" class="btn btn-outline-success" value ="商品管理"/> 
                  <input name="okbutton9" type="submit" class="btn btn-outline-success" value ="會員管理"/>
                  <input name="okbutton10" type="submit" class="btn btn-outline-success" value ="訂單管理"/>          
            </div>        

            <hr size="8" align="center" noshade width="100%" color="A702CF">

            <div class="container">
                <br><br>
                <h2>會員管理</h2>                     
                <table class="table table-striped" align="center">

                    <thead>
                    <tr>
                        <th>編號</th>
                        <th>姓名</th>
                        <th>會員帳號</th>
                        <th>信箱</th>
                        <th>電話</th>
                        <th>地址</th>
                        <th>權限</th>
                        <th>停用／啟用</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php  while($row= mysqli_fetch_assoc($result)) {?>  
                                   
                            <tr>
                                <td>  <?php echo $row["memberID"];   ?></td>
                                <td>  <?php echo $row["name"];       ?> </td>
                                <td>  <?php echo $row["account"];    ?> </td>
                                <td>  <?php echo $row["mail"];       ?> </td>
                                <td>  <?php echo $row["phone"];      ?> </td>
                                <td>  <?php echo $row["address"];    ?> </td>  
                                <td>  <?php echo $row["limitvx"];    ?> </td>
                                <td><input name="gg" type="submit" value ="<?= $row["memberID"]?>"/>
                                        <?php echo " ／ "?>
                                    <input name="qq" type="submit" value ="啟用"/>              
                                </td>             
                            </tr>         
                        <?php } ?>               
                    </tbody>

                </table>
            </div>       

    </form>

</body>
</html>