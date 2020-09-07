<?php

session_start();

// 是否登入
if (isset($_SESSION["account"]))
$account = $_SESSION["account"];
else 
$account = "";

//登出
if (isset($_POST["okbutton2"]))
{
  unset($_SESSION["account"]);
  header("Location: index.php");
}

//商品管理
if(isset($_POST["okbutton8"]))
{
 header("Location:product1.php");
}

//會員管理
if(isset($_POST["okbutton9"]))
{
 header("Location: memberdata.php");
}

$link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());  
$result = mysqli_query($link, "set names utf8");   

$memberid =  $_POST["gg"];
$memberid2 = $_POST["qq"];
$memberid3 = $_POST["od"];


//停用
if (isset($_POST["gg"]))
{
    $Text5 =<<<SqlQuery
    update member set limitvx = 'X' where memberId = '$memberid';
    SqlQuery;         
    $result = mysqli_query ($link, $Text5); 
}

//啟用
if (isset($_POST["qq"]))
{
    $Text6 =<<<SqlQuery
    update member set limitvx = 'V' where memberId = '$memberid2';
    SqlQuery;        
    $result = mysqli_query ($link, $Text6); 
}    

//訂單明細
// if (isset($_POST["od"]))
// {
// header("Location: orderdetail.php");
// } 

//執行SQL敘述   
$Text7 =<<<SqlQuery
SELECT memberID,name ,account, mail, phone, address ,limitvx FROM member where Authority ='0';
SqlQuery;            
$result = mysqli_query($link, $Text7);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.toast.js"></script>
</head>
<body>


    <form  method ="post" >

            <div class = "custom-control">           
                  <font  color="#415FD9" size="7"><u><i>飲料錶購物網</i></u></font> 
                  <input name="okbutton8" type="submit" class="btn btn-success" value ="商品管理"/> 
                  <input name="okbutton9" type="submit" class="btn btn-success" value ="會員管理"/>                     
                  <input name="okbutton2" type="submit" class="btn btn-primary" value ="管理員登出"/><br>                        
                  <font  color="#D14571" size="5"><?php echo "管理員：".$account?></font><br>                               
            </div>        

            <hr size="8" align="center" noshade width="100%" color="A702CF">
            
            <!-- class="container" -->
            <div >
             
                <h2>會員管理</h2>                     
                <table class="table table-striped" align="center" vertical-align="middle">

                    <thead>
                    <tr>
                        <th>編號</th>
                        <th>姓名</th>
                        <th>會員帳號</th>
                        <th>信箱</th>
                        <th>電話</th>
                        <th>地址</th>
                        <th>權限</th>
                        <th>停用 ／ 啟用</th>
                        <th>訂單管理</th>
                    </tr>
                    </thead>
                    <tbody >
                        <?php  while($row= mysqli_fetch_assoc($result)) {?>                                     
                            <tr>
                                <td>  <?php echo $row["memberID"];   ?></td>
                                <td>  <?php echo $row["name"];       ?> </td>
                                <td>  <?php echo $row["account"];    ?> </td>
                                <td>  <?php echo $row["mail"];       ?> </td>
                                <td>  <?php echo $row["phone"];      ?> </td>
                                <td>  <?php echo $row["address"];    ?> </td>  
                                <td>  <?php echo $row["limitvx"];    ?> </td>
                                <td>
                                    <button type="submit" name ="gg" value ="<?= $row["memberID"]?>">停用</button>
                                        <?php echo " ／ "?>
                                    <button type="submit" name ="qq" value ="<?= $row["memberID"]?>">啟用</button>              
                                </td> 
                                <td> <button type="button" name ="od" class="btn btn-danger" onclick="window.location='orderdetail.php?id=<?= $row['account'] ?>'" >訂單明細</button>
                                </td>           
                            </tr>         
                        <?php } ?>               
                    </tbody>

                </table>
            </div>       


    </form>

</body>
</html>