<?php

session_start();

// 是否登入
if (isset($_SESSION["account"]))
$account = $_SESSION["account"];
else 
$account = "";



$link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());  
$result = mysqli_query($link, "set names utf8");

$productid = $_POST["text"];
$productname = $_POST["text0"];
$picture = $_POST["text1"];
$feature = $_POST["text2"];
$price = $_POST["text3"];
$quantity = $_POST["text4"];

$id = $_GET["id"];

if(isset($_POST["modify"]))
{
 $Text5 =<<<SqlQuery
 update product
 set productname = '$productname' , picture = '$picture' , feature = '$feature' , price= '$price' , quantity = '$quantity'
 where productId = '$id';
 SqlQuery;         
 $result = mysqli_query ($link, $Text5); 

 header("Location: product1.php");
//  echo "<script>alert('修改成功');</script>";
}

$Text7 =<<<SqlQuery
SELECT * FROM product where productId = '$id';
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

            <div class = "custom-control">           
                  <font  color="#415FD9" size="7"><u><i>飲料錶購物網</i></u></font>
                  <input name="okbutton8" type="button" class="btn btn-success" value ="商品管理" onclick="window.location='product1.php'"/> 
                  <input name="okbutton9" type="button" class="btn btn-success" value ="會員管理" onclick="window.location='memberdata.php'"/>               
                  <input name="okbutton2" type="submit" class="btn btn-primary" value ="管理員登出"/><br>                        
                  <font  color="#D14571" size="5"><?php echo "管理員：".$account?></font><br>                               
            </div>        

            <hr size="8" align="center" noshade width="100%" color="A702CF">           

                                                      
            <table  class="table" align='center' valign="middle" >
                
                <thead>
                <tr>
                    <th>產品編號</th>
                    <th>名稱</th>
                    <th>圖片</th>
                    <th>特色</th>                 
                    <th>價格</th>
                    <th>庫存</th>
                    <th>操作</th>
                </tr> 
                </thead>
                <tbody>

                    <?php  while($row= mysqli_fetch_assoc($result)) {?>  
                        <tr>
                            <td width ="120">  <?php echo $row["productId"];    ?> </td>
                            <td width ="150">  <?php echo $row["productname"];  ?> </td>
                            <td width ="180">  <img id= <?php echo $row["picture"];?> src ="./image/<?php echo $row["picture"];?>"> </td>
                            <td width ="200"> ＄ <?php echo $row["feature"];        ?> </td>
                            <td width ="150"> ＄ <?php echo $row["price"];        ?> </td>
                            <td width ="150">  <?php echo $row["quantity"];     ?> </td>                                                          
                        </tr>   
                        
                        <tr>
                            <!-- <td> <input type="text" name ="text" id="text" class="form-control" placeholder=""/></td> -->
                            <td></td>
                            <td> <input type="text0" name ="text0" id="text0" class="form-control"  value="<?php echo $row["productname"]; ?>"/></td> 
                            <td> <input type="file" name ="text1" id="text1" class="form-control"   value ="<?php echo $row["picture"];?> "/></td>
                            <td> <input type="text2" name ="text2" id="text2" class="form-control"  value="<?php echo $row["feature"]; ?>"/></td>
                            <td> <input type="text3" name ="text3" id="text3" class="form-control"  value="<?php echo $row["price"]; ?>"/></td>
                            <td> <input type="text4" name ="text4" id="text4" class="form-control"  value="<?php echo $row["quantity"]; ?>"/></td>
                            <td><button name = "modify" type="submit" id="modify" class="btn btn-danger" > 確定修改 </button> </td>
                        </tr>       
                        
                    <?php } ?>               
                </tbody>

            </table>
   
    </form>

</body>
</html>