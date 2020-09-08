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

$link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());  
$result = mysqli_query($link, "set names utf8");

$id = $_GET["id"];


$Text7 =<<<SqlQuery
SELECT * FROM  product1 ;
SqlQuery;        
$result = mysqli_query ($link, $Text7); 


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

            <div class="container">
                <br><br>
                <h2>會員訂單明細</h2>  
                <button name="123" type="button" onclick="window.location='mindex.php'" >回首頁</button>                   
                <table class="table" align='center'  valign="middle">
                    <thead align='center' valign="middle">
                        <tr> 
                            <th>會員帳號</th>                    
                            <th>名稱</th>
                            <th>圖片</th>                                          
                            <th>價格</th>
                            <th>購買數量</th>                                            
                            <th>小計</th>
                            <th>購買時間<th>
                        </tr> 
                    </thead>
                    <tbody>
                    <?php  while($row= mysqli_fetch_assoc($result)) {?>                    
                        <tr> 
                            <?php
                              $total = $row["price"]* $row["buyquantity"]; //小計
                              $sum = $sum + $total;  //總計
                            ?>
                            <td width="120"><?php echo $row["maccount"];?> </td>   
                            <td width="150"><?php echo $row["productname"];?> </td>                       
                            <td width="180"  height="90"><img id= <?php echo $row["picture"];?> src ="./image/<?php echo $row["picture"];?>"></td>               
                            <td width="150">＄<?php echo $row["price"];?></td>
                            <td width="120"><?php echo $row["buyquantity"];?></td>
                            <td width="120">＄ <?php echo $total?></td>   
                            <td width="200"> <?php echo $row["date"];?></td>                                                                                           
                        </tr>
                    <?php } ?>
                     </tbody>
                </table>   

                    <hr size="8" align="center" noshade width="100%" color="A702CF">  
                    <br><br>
                    

                    <div align="right">  
                        <font  color="F42238" size="5"><?php echo "<i>總計</i>：＄" . $sum ."&nbsp&nbsp" ?></font>
                    </div>    


            </div>       
    </form>

</body>
</html>