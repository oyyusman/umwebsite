<?php

require('admin/component/db_config.php');
require('admin/component/essentials.php');
    session_start();

    if(!(isset($_SESSION['login'])&& $_SESSION['login']==true)){
    redirect('index.php');

    if(isset($_POST['pay_now'])){
        $frm_data= filteration($_POST); 
                $query1="INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`) VALUES (?,?,?,?)";
         insert($query1,[$_SESSION['room']['id'],$frm_data['checkin'],$frm_data['checkout']],'sss');

        $booking_id=mysqli_insert_id($con);
         $query2="INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phonenum`, `address`) VALUES (?,?,?,?,?,?,?)";
         insert($query2,$booking_id,$_SESSION['room']['name'],$_SESSION['room']['price'],$frm_data['pay_info'],$frm_data['name'],$frm_data['phone_number'],$frm_data['address'],'issssss');

     }

    

 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .my{
            background-color:aliceblue;
            width: 500px;
            height: 300px;
            align-items: center;
            margin: auto;



        }
        h1{
            margin: auto;
            text-align: center;
            
        }
        button{
            background-color: red;
            border: none;
            border-radius: 25px;
            font-size: 24px;
        }

    </style>
      

</head>
<body>
    <div class="my">
        <p>Payment done successfully</p>
        <button onclick="confirm_booking.php">Back</button>
        
    </div>

</body>
</html>



