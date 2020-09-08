<?php

session_start();

$link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());  
$result = mysqli_query($link, "set names utf8");

$productid = $_POST["update"];
$productname = $_POST["text0"];
$picture = $_POST["text1"];
$feature = $_POST["text2"];
$price = $_POST["text3"];
$quantity = $_POST["text4"];

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

//新增
if(isset($_POST["addgo"]))
{
$Text8 =<<<SqlQuery
INSERT INTO product (productname, picture ,feature, price ,quantity) VALUES ('$productname','$picture', '$feature' ,'$price','$quantity');
SqlQuery;
$result = mysqli_query ($link, $Text8); 
}

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

                <h2>我的商品</h2>
                <input name="add" type="button" id ="add"  class="btn btn-danger" value ="新增"/> 

            <div >                                               
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
                                <td width ="170">  <?php echo $row["productname"];  ?> </td>
                                <td width ="200">  <img id= <?php echo $row["picture"];?>    src ="./image/<?php echo $row["picture"];?>"> </td>
                                <td width ="250"> ＄ <?php echo $row["feature"];        ?> </td>
                                <td width ="180"> ＄ <?php echo $row["price"];        ?> </td>
                                <td>  <?php echo $row["quantity"];     ?> </td>
   
                                <td>                                    
                                    <button type="button" name ="update" id ="update"  onclick="window.location='modify.php?id=<?= $row['productId'] ?>'">修改</button>                                  
                                    <button type="submit" name ="delete" value ="<?= $row["productId"]?>">刪除</button>              
                                </td>                                                                    
                            </tr>        
    
                        <?php } ?>               
                    </tbody>
                </table>
            </div>       

    <!-- 跳出框框 -->
      <div id="newsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">                    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>    
                    <h3>新增商品</h3>            
                </div>
                

                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label >商品名稱</label>
                            <input type="text" name ="text0" id="text0" class="form-control" placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >商品圖片</label>
                            <input type="file" name="text1" id="file" multiple  placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >特色</label>
                            <input type="text2" name="text2" id="text2" class="form-control" placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >＄＄＄＄＄</label>
                            <input type="text" name="text3" id="text3" class="form-control" placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >庫存</label>
                            <input type="text" name="text4" id="text4" class="form-control" placeholder=""/>
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
    






    <div id="Modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">                    
                    <button type="button" class="close" data-dismiss="modal">&times;</button>    
                    <h3>新增商品</h3>            
                </div>
                

                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label >商品名稱</label>
                            <input type="text" name ="text0" id="text0" class="form-control" placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >商品圖片</label>
                            <input type="file" name="text1" id="file" multiple  placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >特色</label>
                            <input type="text2" name="text2" id="text2" class="form-control" placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >＄＄＄＄＄</label>
                            <input type="text" name="text3" id="text3" class="form-control" placeholder=""/>
                        </div>

                        <div class="form-group">
                            <label >庫存</label>
                            <input type="text" name="text4" id="text4" class="form-control" placeholder=""/>
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
          $("#newsModal").modal( { backdrop: "static" });
        })

    </script>
</body>
</html>