<?php 
session_start();

if (isset($_SESSION["account"]))
$account = $_SESSION["account"];
else 
$account = "";

//登入
if (isset($_GET["okbutton1"]))
{
  header("Location: login.php");
}

//管理員登入
if (isset($_GET["okbutton7"]))
{
  header("Location: login.php");
}

//登出
if (isset($_GET["okbutton2"]))
{
  unset($_SESSION["account"]);
  header("Location: index.php");
}

//註冊(登入時不能註冊)
if (isset($_GET["okbutton3"]))
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

    <form  action = "index.php">
      
            <div >                            
                <font face="link" color="#415FD9" size="7"><u><i>購物網</i></u></font>
                <?php if($account == ""){?>
                  <input name="okbutton1" type="submit" class="btn btn-outline-danger" value ="登入"/>
                  <input name="okbutton3" type="submit" class="btn btn-outline-danger" value ="加入會員"/>                   
                <?php } else {?>                 
                  <input name="okbutton2" type="submit" class="btn btn-outline-danger" value ="登出"/>
                <?php }?>

                <input name="okbutton7" type="submit" class="btn btn-outline-info" style="right" value ="管理員登入"/>         
            </div> 

            <div>                    
                  <font face="link" color="#D14571" size="5"><?php echo "歡迎光臨：" . $account ?></font><br>                                                                        
                  <input name="okbutton4" type="submit" class="btn btn-outline-success" value ="賣家中心"/> 
                  <input name="okbutton6" type="submit" class="btn btn-outline-success" value ="我的購物車"/>
            </div>        

            <hr size="8" align="center" noshade width="100%" color="A702CF">    

            <!-- 產品項目 -->
            <div>
              <?php require_once("product.php"); ?>    
            </div>

    </form>

    



</body>
</html>