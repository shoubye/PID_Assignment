<?php

session_start();

$link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());  
$result = mysqli_query($link, "set names utf8");



$Text7 =<<<SqlQuery
SELECT * FROM orderdetail where memberId ;
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
            <div class="container">
                <br><br>
                <h2>會員訂單明細</h2>                     
                <table class="table table-striped" align="center">

                    <thead>
                    <tr>
                        <th>訂單編號</th>
                        <th>編號</th>
                        <th>帳號</th>
                        <th>商品名稱</th>
                        <th>價格</th>
                        <th>數量</th>
                        <th>總金額</th>
                        <th>訂單日期</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php  while($row= mysqli_fetch_assoc($result)) {?>  
                            <tr>
                                <td>  <?php echo $row["orderdetailId"]; ?></td>
                                <td>  <?php echo $row["memberId"];      ?></td>
                                <td>  <?php echo $row["account"];       ?> </td>
                                <td>  <?php echo $row["product"];       ?> </td>
                                <td>  <?php echo $row["price"];         ?> </td>
                                <td>  <?php echo $row["quantity"];      ?> </td>
                                <td>  <?php echo $row["total"];         ?> </td>  
                                <td>  <?php echo $row["date"];          ?> </td>                                   
                            </tr>         
                        <?php } ?>               
                    </tbody>

                </table>
            </div>       

    </form>

</body>
</html>