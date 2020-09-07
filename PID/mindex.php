<?php 
session_start();

if (isset($_SESSION["account"]))
$account = $_SESSION["account"];
else 
$account = "";

//商品管理
if(isset($_POST["okbutton8"]))
{
 header("Location:product1.php");
}

// 會員管理
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
                  <input name="okbutton8" type="submit" class="btn btn-success" value ="商品管理"/> 
                  <input name="okbutton9" type="submit" class="btn btn-success" value ="會員管理"/>                     
                  <input name="okbutton2" type="submit" class="btn btn-primary" value ="管理員登出"/><br>                         
                  <font  color="#D14571" size="5"><?php echo "管理員：".$account?></font><br>                               
                  
              </div>        

            <hr size="8" align="center" noshade width="100%" color="A702CF">

    </form>

    <!-- 對話盒 -->
      <!-- <div id="newsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>新增/修改</h4>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="titleTextBox"> <span class="glyphicon glyphicon-bullhorn"></span> 標題 </label>
                            <input type="text" id="titleTextBox" class="form-control" placeholder="請輸入標題" />
                        </div>
                        <div class="form-group">
                            <label for="ymdTextBox"> <span class="glyphicon glyphicon-time"></span> 日期 </label>
                            <input type="text" id="ymdTextBox" class="form-control" placeholder="yyyy-mm-dd 例如: 2017-05-20">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                      <div class="pull-right">
                          <button type="button" id="okButton" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> 確定 </button>
                          <button type="button" id="cancelButton" class="btn btn-default"  data-dismiss="modal">  <span class="glyphicon glyphicon-remove"></span> 取消 </button>
                      </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        $("#newItem").click(function () {
          currentIndex = -1;
          $("#titleTextBox").val("");
          $("#ymdTextBox").val("");
          $("#newsModal").modal( { backdrop: "static" } );
        })
    </script> -->

</body>
</html>