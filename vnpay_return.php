<?php

session_start();

$user_id = $_SESSION["user_id"];

include "./connect.php";
require_once("./config.php");
if (isset($_GET['vnp_Amount'])) {
    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    $vnp_CardType = $_GET['vnp_CardType'];
    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_TmnCode = $_GET['vnp_TmnCode'];
    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];

    $insert_vnpay = "INSERT INTO payment (
        vnp_amount, vnp_bankcode, vnp_banktranno, vnp_cardType, vnp_orderinfor, vnp_paydate, vnp_tmncode, vnp_transactionno, user_id
    ) VALUES (
        '". $vnp_Amount ."', '". $vnp_BankCode ."', '". $vnp_BankTranNo ."', '". $vnp_CardType ."', '". $vnp_OrderInfo ."', '". $vnp_PayDate ."', '". $vnp_TmnCode ."', '". $vnp_TransactionNo ."', '". $user_id ."'
    )";

    // Chạy truy vấn, ví dụ với MySQLi
    if (mysqli_query($conn, $insert_vnpay)) {
        echo "thanh toán thành công!";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Thông tin thanh toán</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/vnpay/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="assets/vnpay/jumbotron-narrow.css" rel="stylesheet">         
        <script src="assets/vnpay_php/jquery-1.11.3.min.js"></script>
        <!--Style Hoan thanh CSS-->
        <link rel="stylesheet" href="./assets/css/success.css" />
    </head>
    <body>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">Thông tin giao dich</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>
                    
                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?=number_format($_GET['vnp_Amount']/100) ?> VNĐ</label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                      
                    </label>
                    <br>
                    <a href="\TrungTamTiengAnh\index.php">
                        <button class="back" name="back">Quay lại</button>
                    </a>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; Quản lý Tiếng Anh 2024</p>
            </footer>
        </div>  
    </body>
</html>
