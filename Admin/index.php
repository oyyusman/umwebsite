<?php require('component/db_config.php');
     require('component/essentials.php');
    //  this check wil check if you are on dashboard then you will not have to return to 
    // to main login page after redirecting(that mean when you are login then you will again 
    // got to login page)
    // you cannot start session twice with in same form
     session_start();
     
        if((isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true)){
           redirect('dashboard.php');
        }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    
    <?php require('component/links.php') ?>

    
    
    

    <style>
        /* display the div in center of screen */
       div.login-form{
           position: absolute;
           top:50%;
           left:50%;
           transform: translate(-50%,-50%);
           width:400px;
        }
        .custom-alert{
         position:fixed;
         top:80px;
         right:25px;
}

    </style>
</head>
<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">Admin login panel</h4>
        <div class="p-4">
            <div class="mb-3">
                        
                        <input name="admin_name" required type="text" class="form-control  shadow-none text-center" placeholder="Admin name">
            </div>
            <div class="mb-4">
                       
                        <input name="admin_pass" required type="password" class="form-control  shadow-none text-center" placeholder="password">
            </div>
            <button name="login" type="submit" class="btn text-white custom-bg shadow-none" >LOGIN</button> 
        </div>
        </form>
    </div>

    <?php
    if(isset($_POST['login']))
    {
        $frm_data=filteration($_POST);
        
        $query="SELECT  * FROM  `admin_crud` WHERE `admin_name`=? AND `admin_pass`=?";
        $values=[$frm_data['admin_name'],$frm_data['admin_pass']];
        
       $res= select($query,$values,"ss");
       if($res->num_rows==1){
        $row=mysqli_fetch_assoc($res);
      
        $_SESSION['adminlogin']=true;
        $_SESSION['adminid']=$row['sr_no'];
        redirect('dashboard.php');
       }
       else{
        alert('error','login failder - invalid credientials!');
       }
    }
    ?>
    


<?php require('component/script.php') ?>
</body>
</html>