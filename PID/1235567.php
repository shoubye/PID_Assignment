<?php 

session_start();

  if (isset($_SESSION["account"]))
  $account = $_SESSION["account"];
  else 
  $account = " ";

  //登入
  if (isset($_GET["okbutton1"]))
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
      $_SESSION ["lastPage"]= "detail.php";
      header("Location: index.php");
      exit();
        
    }
    else
    header("Location: signup.php");
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>

</style>


</head>
<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <form  action = "index.php?radiobox=">
    
   
            <div class="form-group row">
              <table style="border:3px #FFD382 dashed;" cellpadding="10" border='1' align="center">
        

                  <div class = "custom-control">           
                    <font face="link" color="#415FD9" size="7"><u><i>購物車</i></u></font>    
                    
                        <div>
                          <input name="okbutton1" type="submit" class="btn btn-outline-info" value ="管理"/> 
                          <input name="okbutton2" type="submit" class="btn btn-outline-success" value ="會員"/>                       
                        </div>              
                  </div>         
            </div> 
    
    </form>




</body>
</html>