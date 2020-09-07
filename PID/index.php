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

//管理員登入
if (isset($_POST["okbutton7"]))
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
                <input name="okbutton4" type="submit" class="btn btn-success" value ="賣家中心"/>  
                <?php if($account == ""){?>
                  <input name="okbutton1" type="submit" class="btn btn-danger" value ="登入"/>
                  <input name="okbutton3" type="submit" class="btn btn-danger" value ="加入會員"/>                 
                <?php } else {?>  
                  <button type="button" name ="record" class="btn btn-primary" onclick="window.location='orderdetail.php?id=<?= $account ?>'" >購買紀錄</button>               
                  <input name="okbutton2" type="submit" class="btn btn-danger" value ="登出"/>    
                <?php }?>
                      
            </div> 

                <font  color="#D14571" size="4"><?php echo "歡迎光臨：" . $account ?></font><br>                                                                        
    
            <hr size="8" align="center" noshade width="100%" color="A702CF">    

 
    </form>

    



</body>
</html>