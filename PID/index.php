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
    $_SESSION ["lastPage"]= "signup.php";
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

  <div>
    <form  action = "index.php?radiobox=">
    
   
            <div class="form-group row">
              <table style="border:3px #FFD382 dashed;" cellpadding="10" border='1' align="center">
        

                  <div class = "custom-control">           
                  <font face="link" color="#415FD9" size="7"><u><i>魚皮購物網</i></u></font>
                      
                      <input name="okbutton1" type="submit" class="btn btn-outline-danger" value ="登入"/> 
                      <input name="okbutton2" type="submit" class="btn btn-outline-danger" value ="登出"/> 
                      <input name="okbutton3" type="submit" class="btn btn-outline-danger" value ="加入會員"/> 
                        
                        
                        <div class = "custom-control">
                        <font face="link" color="#D14571" size="4"><?php echo "歡迎光臨：" . $account ?></font>
                        </div>

                        <div class = "custom-control">                                      
                          <input name="okbutton4" type="submit" class="btn btn-outline-success" value ="賣家中心"/> 
                          <input name="okbutton6" type="submit" class="btn btn-outline-success" value ="我的購物車"/> 
                        </div>
   
                  </div>           
            </div> 

            <hr size="8" align="center" noshade width="100%" color="A702CF">

            

      <!-- 產品項目 -->
    <div>
            <?php if (isset($_GET["okbutton4"])) {?>

            <table style="border:3px #cccccc solid;" cellpadding="10" border='1' align="center">
            <tbody>

            <tr>
            <td width="250"  height="180">  <img src="">  </td>
            <td width="250"  height="180">  <img src="">  </td>
            <td width="250"  height="180">  <img src="">  </td>
            </tr>


            <tr>
            <td>價格：$100 &nbsp;&nbsp;<input name="okbutton5" type="submit" class="btn btn-danger btn-sm" value ="加入購物車"/></td>
            <td>價格：$200 &nbsp;&nbsp;<input name="okbutton5" type="submit" class="btn btn-danger btn-sm" value ="加入購物車"/></td>
            <td>價格：$300 &nbsp;&nbsp;<input name="okbutton5" type="submit" class="btn btn-danger btn-sm" value ="加入購物車"/></td>
            </tr>


            <tr>
            <td width="250"  height="180">  <img src="">  </td>
            <td width="250"  height="180">  <img src="">  </td>
            <td width="250"  height="180">  <img src="">  </td>
            </tr>


            <tr>
            <td>價格：$400 &nbsp;&nbsp;<input name="okbutton5" type="submit" class="btn btn-danger btn-sm" value ="加入購物車"/></td>
            <td>價格：$500 &nbsp;&nbsp;<input name="okbutton5" type="submit" class="btn btn-danger btn-sm" value ="加入購物車"/></td>
            <td>價格：$600 &nbsp;&nbsp;<input name="okbutton5" type="submit" class="btn btn-danger btn-sm" value ="加入購物車"/></td>
            </tr>


            <tr>
            <td width="250"  height="180">  <img src="">  </td>
            <td width="250"  height="180">  <img src="">  </td>
            <td width="250"  height="180">  <img src="">  </td>
            </tr>


            <tr>
            <td>價格：$700 &nbsp;&nbsp;<input name="okbutton5" type="submit" class="btn btn-danger btn-sm" value ="加入購物車"/></td>
            <td>價格：$800 &nbsp;&nbsp;<input name="okbutton5" type="submit" class="btn btn-danger btn-sm" value ="加入購物車"/></td>
            <td>價格：$900 &nbsp;&nbsp;<input name="okbutton5" type="submit" class="btn btn-danger btn-sm" value ="加入購物車"/></td>
            </tr>       

            </tbody>
            </table>

          <?php } ?>
     </div>




    </form>
  </div>
    



</body>
</html>