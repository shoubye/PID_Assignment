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
  header("Location: signup.php");
}

$link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());  
$result = mysqli_query($link, "set names utf8");

$Text =<<<SqlQuery
SELECT * FROM product ;
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
  

    <form  action = "index.php" method ="post">
      
            <div >                            
                <font color="#415FD9" size="7"><u><i>飲料錶購物網</i></u></font>
                <input name="okbutton4" type="button" class="btn btn-success" value ="賣家中心" onclick="window.location='product.php'"/>  
                <?php if($account == ""){?>
                  <input name="okbutton1" type="submit" class="btn btn-danger" value ="登入"/>
                  <input name="okbutton3" type="submit" class="btn btn-danger" value ="註冊"/>                 
                <?php } else {?>  
                  <input name="okbutton6" type="button" class="btn btn-info" value ="我的購物車" onclick="window.location='cart.php'"/>
                  <button type="button" name ="record" class="btn btn-primary" onclick="window.location='orderdetail.php?id=<?= $account ?>'">購買紀錄</button>               
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
                            <th>剩餘數量</th>                                              
                            <th></th>
                        </tr> 
                    </thead>

                    <tbody>

                    <?php  while($row= mysqli_fetch_assoc($result)) {?>                    
                        <tr>    
                            <td width="150"><?php echo $row["productname"];?> </td>                       
                            <td width="200"  height="90"><img id= <?php echo $row["picture"];?> src ="./image/<?php echo $row["picture"];?>"></td>
                            <td width="250"><?php echo $row["feature"];?></td>
                            <td width="150">＄<?php echo $row["price"];?></td>
                            <td width="150"><?php echo $row["quantity"];?></td> 
                            <?php if(isset($_SESSION["account"])){?>            
                            <td><button name="addcart" type="submit" class="btn btn-sm  btn-danger" value ="<?php echo $row["productId"];?>">購物車</button></td>
                            <?php } ?>        
                        </tr>
                    <?php } ?>
                     </tbody>
               </table>
 
    </form>

</body>
</html>