<?php 
   require('component/essentials.php');
   require('component/links.php');
   
   adminlogin();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -Dashboard</title>
    
    <style>
    #dashboard-menu{
    position: fixed;
    height: 100%;
    z-index: 11;
   }
   @media screen and (max-width:991px){
    #dashboard-menu{
    height: auto;
    width: 100%;
    
   }
   #main-content{
      margin-top: 60px;
      
   }

   }
   
    </style>


</head>
<body class="bg-light">
     <?php require('component/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            </div>
        </div>
    </div>
    <?php require('component/script.php') ?>
</body>
</html>