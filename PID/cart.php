<?php

session_start();

if (isset($_SESSION["account"]))
$account = $_SESSION["account"];
else 
$account = "";

//登入
if (isset($_POST["okbutton1"]))
{
  header("Location: login.php");
}

//登出
if (isset($_POST["okbutton2"]))
{
  unset($_SESSION["account"]);
  header("Location: index.php");
}

//註冊(登入時不能註冊)
if (isset($_POST["okbutton3"]))
{
  if (isset($_SESSION["account"]))
  {  
    $_SESSION ["lastPage"]= "signup.php";
    header("Location: index.php");
    exit();      
  }
  else
  header("Location: signup1.php");
}

//賣家中心
if (isset($_POST["okbutton4"]))
{
  header("Location: product.php");
}

$link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());  
$result = mysqli_query($link, "set names utf8");


$cartdelete = $_POST["cartdelete"];
$buyquantity = $_POST["buyquantity"];
$cartId = $_POST["++"];
$cartId1 = $_POST["--"];
$date = date('Y-m-d H:i:s');

// ++
if (isset($_POST["++"]))
{
  //購買數量
  $Text4 =<<<SqlQuery
  SELECT buyquantity FROM cart where cartId = '$cartId';
  SqlQuery;
  $result = mysqli_query ($link, $Text4);
  $row = mysqli_fetch_assoc($result);
  $b = implode("",$row);
  
  //庫存
  $Text10 =<<<SqlQuery
  SELECT quantity FROM cart where cartId = '$cartId';
  SqlQuery;  
  $result = mysqli_query ($link, $Text10);
  $row = mysqli_fetch_assoc($result);
  $a = implode("",$row);

  if($a > $b){$b = $b + 1;}  

  $Text7 =<<<SqlQuery
  update cart set buyquantity = '$b' where cartId = '$cartId';
  SqlQuery;         
  $result = mysqli_query ($link, $Text7); 
 
} 

// --
if (isset($_POST["--"]))
{
  //購買數量
  $Text6 =<<<SqlQuery
  SELECT buyquantity FROM cart where cartId = '$cartId1';
  SqlQuery; 
  $result = mysqli_query ($link, $Text6);
  $row = mysqli_fetch_assoc($result); 
  $b = implode("",$row);

  if($b > 0) { $b = $b - 1; }
 
  $Text5 =<<<SqlQuery
  update cart set buyquantity = '$b' where cartId = '$cartId1';
  SqlQuery;         
  $result = mysqli_query ($link, $Text5); 
} 

//刪除
if(isset($_POST["cartdelete"]))
{
  $Text1 =<<<SqlQuery
  Delete from cart where cartId = '$cartdelete' ;
  SqlQuery;
  $result = mysqli_query ($link, $Text1); 
}

//結帳
if(isset($_POST["all"]))
{
  $Text2 =<<<SqlQuery
  INSERT INTO orderdetail (maccount, productId , productname ,picture, price ,feature ,buyquantity ,date) 
  SELECT maccount , productId , productname , picture, price , feature , buyquantity ,'$date'
  FROM cart
  SqlQuery;  
  $result = mysqli_query ($link, $Text2); 

  $Text8 =<<<SqlQuery
  truncate table cart;
  SqlQuery;  
  $result = mysqli_query ($link, $Text8); 

  echo "<script>alert('謝謝您的購買，歡迎再次光臨');</script>";
}

//我的購物車
$Text =<<<SqlQuery
SELECT * FROM cart where maccount = '$account' ;
SqlQuery;        
$result = mysqli_query ($link, $Text); 

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
    <form  method = "post" action = "cart.php">
      
            <div >                            
                <font color="#415FD9" size="7"><u><i>飲料錶購物網</i></u></font>
                <?php if($account == ""){?>
                  <input name="okbutton1" type="submit" class="btn btn-danger" value ="登入"/>
                  <input name="okbutton3" type="submit" class="btn btn-danger" value ="加入會員"/>
                  <input name="okbutton7" type="submit" class="btn btn-primary" style="right" value ="管理員登入"/>                   
                <?php } else {?> 
                  <input name="okbutton4" type="submit" class="btn btn-info" value ="繼續購物"/> 
                  <button type="button" name ="record" class="btn btn-primary" onclick="window.location='orderdetail.php?id=<?= $account ?>'" >購買紀錄</button>               
                  <input name="okbutton2" type="submit" class="btn btn-danger" value ="登出"/>
                <?php }?>  
                     
            </div> 
            <font  color="#D14571" size="4"><?php echo "歡迎光臨：" . $account ?></font><br>                                                                       

            <hr size="8" align="center" noshade width="100%" color="A702CF">    

                <table class="table" align='center' valign="middle">
                    <thead align='center' valign="middle">
                        <tr>                            
                            <th>名稱</th>
                            <th>圖片</th>
                            <th>特色</th>                
                            <th>價格</th>
                            <th>購買數量</th>                                            
                            <th>小計</th>                            
                        </tr> 
                    </thead>
                    <tbody>
                    <?php  while($row= mysqli_fetch_assoc($result)) {?>                    
                        <tr>  
                            <?php
                              $total = $row["price"]* $row["buyquantity"]; //小計
                              $sum = $sum + $total;  //總計
                            ?>
                            <td width="150"><?php echo $row["productname"];?> </td>                       
                            <td width="200"  height="90"><img id= <?php echo $row["picture"];?> src ="./image/<?php echo $row["picture"];?>"></td>
                            <td width="250">＄<?php echo $row["feature"];?></td>
                            <td width="150">＄<?php echo $row["price"];?></td>
                                <td width="200">
                                    <button name="++" type="submit" value ="<?php echo $row["cartId"];?>">＋</button>
                                    <input name="buyquantity" type="text"  id="buyquantity" size="1" valign="middle" value = "<?php echo $row["buyquantity"];?>"/>
                                    <button name="--" type="submit" value ="<?php echo $row["cartId"];?>">－</button>
                                </td>
                            <td width="120">＄ <?php echo $total?></td>                                                                                        
                            <td><button name="cartdelete" type="submit" class="btn btn-sm btn-danger" value ="<?php echo $row["cartId"];?>">刪除</button></td> 
          
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>

            <hr size="8" align="center" noshade width="100%" color="A702CF">  
            <div align="right">  
                <font  color="#000" size="5"><?php echo "<i>總計</i>：＄" . $sum ."&nbsp&nbsp" ?></font>
                <button name="all" type="submit" class="btn btn btn-primary" >結帳</button>
            </div>
    </form>
</body>
</html>