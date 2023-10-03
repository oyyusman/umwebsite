<?php
 require('../admin/component/db_config.php');
 require('../admin/component/essentials.php');
 if(isset($_POST['register'])){
    $data=filteration($_POST);

    // match password and confirm password field

    if($data['password']!=$data['cpassword']){
        echo 'pass_mismatch';
         exit;

    }
    // check user if already exist
    $u_exist=select("SELECT * FROM `user_crud` WHERE `email`=? OR `phonenumber`=? LIMIT 1",[$data['email'],$data['phonenumber']] ,"ss");
    if(mysqli_num_rows($u_exist)!=0){
        $u_exist_fetch=mysqli_fetch_assoc($u_exist);
        echo($u_exist_fetch['email']==$data['email'])? 'email_already': 'phone_already';
        exit;

    }
    // encrypt password
    $enc_password=password_hash($data['pass'],PASSWORD_BCRYPT);
    $query="INSERT INTO `user_crud`(`name`, `address`, `phonenumber`, `pincode`, `dob`, `password`, `email`) VALUES (?,?,?,?,?,?,?)";
    $values=[$data['name'],$data['address'],$data['phonenumber'],$data['pincode'],$data['dob'],$enc_password,$data['email']];
    if(insert($query,$values,'sssssss')){
        echo 1;
    }
    else{
        echo 'enc_failed';
    }
}

 if(isset($_POST['login'])){
    $data=filteration($_POST);
    // check user if already exist
    $u_exist=select("SELECT * FROM `user_crud` WHERE `email`=? OR `phonenumber`=? LIMIT 1",[$data['email_mob'],$data['email_mob']] ,"ss");
    if(mysqli_num_rows($u_exist)==0){

        echo 'invalid_mobile_no';
        
    }
    else{
        $u_fetch=mysqli_fetch_assoc($u_exist);
        if($u_fetch['status']==0){
            echo 'inactive';
        }
        else{
            if(password_verify($data['pass'],$u_fetch['password'])){
                echo 'invalid_pass';
            }
            else{
                session_start();
                $_SESSION['login']=true;
                $_SESSION['uid']=$u_fetch['id'];
                $_SESSION['uName']=$u_fetch['name'];
                $_SESSION['uPhone']=$u_fetch['phonenumber'];
                echo 1;


            }
        }
        

    }
   


 }
 
 ?>
