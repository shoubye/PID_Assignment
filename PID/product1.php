<?php

session_start();

$link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());  
$result = mysqli_query($link, "set names utf8");


$productname = $_POST["text0"];
$picture = $_POST["text1"];
$price = $_POST["text2"];
$quantity = $_POST["text3"];
$delete = $_POST["delete"];
$update = $_POST["update"];

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

// 商品管理
if(isset($_POST["okbutton8"]))
{
 header("Location:product1.php");
}

//會員管理
if(isset($_POST["okbutton9"]))
{
 header("Location: memberdata.php");
}

//新增
if(isset($_POST["addgo"]))
{
  $Text8 =<<<SqlQuery
  INSERT INTO product (productname, picture , price ,quantity) VALUES ('$productname','$picture','$price','$quantity');
  SqlQuery;
  $result = mysqli_query ($link, $Text8); 
}

//修改
// if(isset($_POST["update"]))
// {
//   $Text9 =<<<SqlQuery
//   INSERT INTO product (productname, picture , price ,quantity) VALUES ('$productname','$picture','$price','$quantity');
//   SqlQuery;
//   $result = mysqli_query ($link, $Text9); 
// }

//刪除
if(isset($_POST["delete"]))
{
  $Text10 =<<<SqlQuery
  Delete from product where productId = '$delete' ;
  SqlQuery;
  $result = mysqli_query ($link, $Text10); 
}


$Text7 =<<<SqlQuery
SELECT * FROM product ;
SqlQuery;        
$result = mysqli_query ($link, $Text7); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.toast.js"></script>
 
</head>
<body>

    <form  method ="post" >

            <div class = "custom-control">           
                  <font face="link" color="#415FD9" size="7"><u><i>購物網</i></u></font>                     
                  <input name="okbutton2" type="submit" class="btn btn-primary" value ="管理員登出"/><br>                        
                  <font face="link" color="#D14571" size="5"><?php echo "管理員：".$account?></font><br>                               
                  <input name="okbutton8" type="submit" class="btn btn-success" value ="商品管理"/> 
                  <input name="okbutton9" type="submit" class="btn btn-success" value ="會員管理"/>         
            </div>        

            <hr size="8" align="center" noshade width="100%" color="A702CF">
            
            <div class="container">                
                    <h2>我的商品</h2>
                    <input name="add" type="button" id ="add"  class="btn btn-danger" value ="新增"/> 
              
                <table class="table table-striped" align="center" cellspacing = 0  cellspadding = 0>

                    <thead>
                    <tr>
                        <th>產品編號</th>
                        <th>名稱</th>
                        <th>圖片</th>                
                        <th>價格</th>
                        <th>數量</th>
                        <th>操作</th>
                    </tr> 
                    </thead>
                    <tbody>
 
                        <?php  while($row= mysqli_fetch_assoc($result)) {?>  
                            <tr>
                                <td>  <?php echo $row["productId"];    ?> </td>
                                <td>  <?php echo $row["productname"];  ?> </td>
                                <td>  <img id= <?php echo $row["picture"];?>    src ="./image/<?php echo $row["picture"];?>"> </td>
                                <td>  <?php echo $row["price"];        ?> </td>
                                <td>  <?php echo $row["quantity"];     ?> </td>
   
                                <td>                                    
                                    <button type="submit" name ="update" value ="<?= $row["productId"]?>">修改</button>                                  
                                    <button type="submit" name ="delete" value ="<?= $row["productId"]?>">刪除</button>              
                                </td>                                                                    
                            </tr>         
                        <?php } ?>               
                    </tbody>
                </table>
            </div>       



    <!-- 對話盒 -->
      <div id="newsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                
                </div>

                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label >商品名稱</label>
                            <input type="text" name ="text0" id="text0" class="form-control" placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >商品圖片</label>
                            <input type="file" name="text1" id="text1" multiple  placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >＄＄＄＄＄</label>
                            <input type="text" name="text2" id="text2" class="form-control" placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >庫存</label>
                            <input type="text" name="text3" id="text3" class="form-control" placeholder=""/>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                      <div class="pull-right">
                          <button name = "addgo" type="submit" id="okButton" class="btn btn-success"> 確定 </button>
                          <button name = "addgg" type="submit" id="cancelButton" class="btn btn-default"  data-dismiss="modal"> 取消 </button>
                      </div>
                </div>

            </div>
        </div>
    </div>
  
    </form>

    <script>
        $("#add").click(function () {
            //alert("ok");
          $("#newsModal").modal( { backdrop: "static" } );
        })
    </script>
</body>
</html>