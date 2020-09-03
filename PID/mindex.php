<?php 
session_start();

if (isset($_SESSION["account"]))
$account = $_SESSION["account"];
else 
$account = "";

//會員管理
if(isset($_POST["okbutton9"]))
{
 header("Location: memberdata.php");
}

//登出
if (isset($_POST["okbutton2"]))
{
  unset($_SESSION["account"]);
  header("Location: index.php");
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

    <form  action = "mindex.php" method ="post">
                  
              <div class = "custom-control">           
                  <font face="link" color="#415FD9" size="7"><u><i>購物網</i></u></font>                     
                  <input name="okbutton2" type="submit" class="btn btn-outline-info" value ="管理員登出"/><br>                        
                  <font face="link" color="#D14571" size="5"><?php echo "管理員：".$account?></font><br>                               
                  <input name="okbutton8" type="submit" class="btn btn-outline-success" value ="商品管理"/> 
                  <input name="okbutton9" type="submit" class="btn btn-outline-success" value ="會員管理"/>
                  <input name="okbutton10" type="submit" class="btn btn-outline-success" value ="訂單管理"/>          
              </div>        

            <hr size="8" align="center" noshade width="100%" color="A702CF">

    </form>

</body>
</html>