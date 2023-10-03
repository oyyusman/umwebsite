<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>*CONFIRM BOOKING*</title>
    <?php require('component/links.php') ?>
    <style>
        .h-line {
            width: 150px;
            margin: 0 auto;
            height: 1.7px;

        }
    </style>

</head>

<body class="bg-light">

    <?php require('component/header.php'); ?>
    <?php
    /*check room id from url is prsent or not
    user is logged in or not

    */
    if(!isset($_GET['id'])){
        redirect('rooms.php');
    }
    else if(!(isset($_SESSION['login'])&& $_SESSION['login']==true)){
        redirect('rooms.php');

    }
    // filter and get room and user data
    $data=filteration($_GET);
    $room_res=select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');
    if(mysqli_num_rows($room_res)==0){
        redirect('rooms.php');
    }
    $room_data=mysqli_fetch_assoc($room_res);
    $_SESSION['room']=[
        "id"=> $room_data['id'],
        "name"=>$room_data['name'],
        "price"=>$room_data['price'],
        "payment"=>null,
        "available"=>false,
    ];
    
    $user_res= select("SELECT * FROM `user_crud` WHERE `id`=? LIMIT 1",[$_SESSION['uid']] ,"i");
    $user_data=mysqli_fetch_assoc($user_res);


     ?>
    
<div class="container">
    <div class="row">
            <div class="col-12 my-5 mb-4 px-4">
                    <h2 class="fw-bold ">CONFIRM BOOKING</h2>
                <div style="font-size:14px">
                  <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                  <span class="text-secondary"> ></span>
                  <a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
                  <span class="text-secondary"> ></span>
                  <a href="rooms.php" class="text-secondary text-decoration-none">CONFIRM</a>
                </div>

            </div>
           <div class="col-lg-7 col-md-12 px-4 ">
                     <?php
                    $room_thumb=ROOMS_IMG_PATH."thumbnail.jpg";
                    $thumb_q=mysqli_query($con,"SELECT * FROM `room_images`
                     WHERE `room_id`='$room_data[id]'
                   AND `thumb`='0' ");
                    if(mysqli_num_rows($thumb_q)>0){
                     $thumb_res=mysqli_fetch_assoc($thumb_q);
                     $room_thumb=ROOMS_IMG_PATH.$thumb_res['image'];
                     }
                        echo<<<data
                            <div class="card p-3 shadow-sm rounded ">
                              <img src="images/rooms/1.jpg" class="img-fluid rounded mb-3" >
                              <h5>$room_data[name]</h5>
                              <h6>$ $room_data[price] per night</h6>
                            </div>

                        data;

                    ?>
            </div>
            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3" >
                    <div class="card-body">
                        <form action="pay_now.php" id="booking_form">
                               <h6 class="mb-3">BOOKING DETAILS</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                
                                    <label class="form-label mb-1 ">Name</label>
                                    <input name="name" type="text" class="form-control  shadow-none" value="<?php echo  $user_data['name'] ?>" required>
                            

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">phone number</label>
                                    <input name="phone_number" type="number" class="form-control  shadow-none" value="<?php echo $user_data['phonenumber'] ?>"  required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label ">Address</label>
                                    <textarea name="address" class="form-control shadow-none" rows="1"  required><?php echo $user_data['address'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label " >Check-in</label>
                                    <input name="checkin" type="date" onchange="check_availability()" class="form-control  shadow-none"required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" >Check-out</label>
                                    <input name="checkout" type="date" onchange="check_availability()" class="form-control  shadow-none"required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" >Card No</label>
                                    <input name="payment-method" type="text" class="form-control  shadow-none" minlength="10">
                                </div>
                                <div class="col-12">
                                        <div class="spinner-border text-info mb-3 d-none" id="info_loader" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    <h6 class="mb-3 text-danger" id="pay_info">provide check-in and check-out date!</h6>
                                    <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled data-bs-target="#loginModel" onclick="alert('payment done successfully')">Pay Now</button>

                                </div>
                            </div>

                        </form>
                
                    </div>

                </div>


    
            </div>        
    </div>
</div>

<div class="modal fade" id="loginModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login_form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>
                        Login User
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email address /Mobile no</label>
                        <input name="email_mob" type="text" class="form-control  shadow-none" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label ">Password</label>
                        <input name="pass" type="password" class="form-control  shadow-none" required>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <Button type="submit" class="btn btn-dark shadow-none">Login</Button>
                        <!-- because of javascript:void(0) nothing wil happen when we click forget password -->
                        <a href="javascript:void(0)" class="text-secondary text-decoration-none">Forget password?</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
            

            <!-- next columnn -->


    

        

        
    
    <!-- footer session start -->
    <?php require('component/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        let booking_form=document.getElementById('booking_form');
        let pay_info=document.getElementById('pay_info');
        let info_loader=document.getElementById('info_loader');

        function check_availability(){

            let checkin_val=booking_form.elements['checkin'].value;
            let checkout_val=booking_form.elements['checkout'].value;
            booking_form.elements['pay_now'].setAttribute('disabled',true);

            if(checkin_val!='' && checkout_val!=''){
                

                let data= new FormData();
                data.append('check_availability','');
                data.append('check_in',checkin_val);
                data.append('check_out',checkout_val);
                let xhr = new XMLHttpRequest();
    // true for ashyronous function
               xhr.open("POST", "ajax/confirm_booking.php", true);
               xhr.onload = function(){
            let data=JSON.parse(this.responseText);
            if(data.status=='check_in_out_equal'){
                pay_info.innerText="you cannot check-out on same date";
            }
            else if(data.status=='check_out_earlier'){
                pay_info.innerText="check out date is earlier than check-in date ";
            }
            else if(data.status=='check_in_earlier'){
                pay_info.innerText="check in date is earlier than todays  date ";
            }
            else if(data.status=='unavailable'){
                pay_info.innerText="Room not availabe for this check-in date";
            }
            else{
                pay_info.innerHTML="No. of Days:"+data.days+"<br>Total Amount to pay:$"+data.payment;
                booking_form.elements['pay_now'].removeAttribute('disabled');
            }
            

        
        

        
    }
    xhr.send(data);




            }




        }


    </script>
    <!-- Initialize Swiper -->

</body>

</html>