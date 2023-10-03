<?php
require('component/essentials.php');
require('component/links.php');
require('component/db_config.php');

adminlogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel - Users Queries</title>

    <style>
        #dashboard-menu {
            position: fixed;
            height: 100%;
            z-index: 11;
        }

        .custom-alert {
            position: fixed;
            top: 80px;
            right: 25px;
        }

        @media screen and (max-width:991px) {
            #dashboard-menu {
                height: auto;
                width: 100%;

            }

            #main-content {
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
                <h3 class="mb-4">Users</h3>
                <!--feature  session  -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <input type="text" oninput="search_user(this.value)" class="form-control shadow-none ms-auto w-25 " placeholder="Type to search">
                            
                        </div>
                        

                            <div class="table-responsive" >
                                <table class="table table-hover border text-center " style="min-width: 1500px;">
                                        <thead>
                                            <tr class="bg-dark text-light">
                                                   <th scope="col">#</th>
                                                   <th scope="col">Name</th>
                                                   <th scope="col">Email</th>
                                                   <th scope="col">phone no</th>
                                                   <th scope="col">Location</th>
                                                   <th scope="col">DOB</th>
                                                   <th scope="col">Status</th>
                                                   <th scope="col">Date</th>
                                                  <th scope="col" width="20%">Action</th>


                                            </tr>
                                        </thead>
                                    <tbody id="users-data">
                                    </tbody>
                                </table>
                            </div>

                    </div>
                  
                </div>  
  
            </div>
        </div>
    </div>



   




<?php require('component/script.php') ?>
<script>
  


function get_users(){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // header of post request for picture important
    xhr.onload = function() { 
        document.getElementById('users-data').innerHTML=this.responseText;

        
    }
    xhr.send('get_users');

}


function toggleStatus(id,val){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // header of post request for picture important
    xhr.onload = function() { 
      if(this.responseText==1){
          alert('success','Status toggled:');
          get_users();
      }
      else{
        alert('error','server is down');
      }

        
    }
    xhr.send('toggleStatus='+id+'&value='+val);

}

function remove_user(user_id){
    // FormData interface for pictures
    if(confirm("are you sure to want to remove this user")){
        let data= new FormData();
        data.append('user_id',user_id);
        data.append('remove_user','');
        let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/users.php", true);
    // header of post request for picture important


    xhr.onload = function() {
    
        if(this.responseText == 1){
            alert('alert','user successfully removed');
            get_users();


        }
        
        else{
            alert('error','user Removal failed');
           }

}
    xhr.send(data);
    // file 0 mean that only first image selected will be choosen
}
}

function search_user(username){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // header of post request for picture important
    xhr.onload = function() { 
        document.getElementById('users-data').innerHTML=this.responseText;

        
    }
    xhr.send('search_user&name='+username);

}
window.onload=function(){
    get_users();
}
        
    

</script>



</body>

</html>