<?php 
session_start();

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
 

    <form  action = "mindex.php" method ="post">
                  
              <div class = "custom-control">           
                  <font  color="#415FD9" size="7"><u><i>飲料錶購物網</i></u></font>
                  <input name="okbutton8" type="button" class="btn btn-success" value ="商品管理" onclick="window.location='product1.php'"/> 
                  <input name="okbutton9" type="button" class="btn btn-success" value ="會員管理" onclick="window.location='memberdata.php'"/>                   
                  <input name="okbutton2" type="submit" class="btn btn-primary" value ="管理員登出"/><br>                         
                  <font  color="#D14571" size="5"><?php echo "管理員：".$account?></font><br>                               
                  
              </div>        

            <hr size="8" align="center" noshade width="100%" color="A702CF">

    </form>

</body>
</html>