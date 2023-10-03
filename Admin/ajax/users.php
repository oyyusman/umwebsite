i<?php
require('../component/db_config.php');
require('../component/essentials.php');
adminlogin();


if (isset($_POST['get_users'])){
  $res=selectAll('user_crud');
  $i=1;
  $data="";
  while($row=mysqli_fetch_assoc($res)){

    $del_btn="<button type='button' onclick='remove_user($row[id])' class='btn btn-dark shadow-none'>
    <i class='bi bi-trash'></i></button>";
    $status="<button onclick='toggleStatus($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
    if(!$row['status']){
      $status="<button onclick='toggleStatus($row[id],1)' class='btn btn-danger btn-sm shadow-none'>inactive</button>";


    }
    $date=date("d-m-Y",strtotime($row['date/time']));

    $data.="
    <tr class='align-middle'>
       <td>$i</td>
       <td>$row[name]</td>
       <td>$row[email]</td>
       <td>$row[phonenumber]</td>
       <td>$row[address] | $row[pincode]</td>
       <td>$row[dob]</td>
       <td>$status</td>
       <td>$date</td>
       <td>$del_btn</td>
       
       
         
    </tr>
    
    ";
    $i++;


  }
  echo $data;

}




if(isset($_POST['toggleStatus'])){
   $frm_data=filteration($_POST);
   $q="UPDATE `user_crud` SET `status`=? WHERE `id`=?";
   $v=[$frm_data['value'],$frm_data['toggleStatus']];
   if(update($q,$v,'ii')){
     echo 1;
   }
   else{
    echo 0;
   }

}



if(isset($_POST['remove_user'])){
  $frm_data=filteration($_POST);
  
  $res11=delete("DELETE FROM `user_crud` WHERE `id`=? AND `status`=?",[$frm_data['user_id'],0],'ii');
  if($res11){
    echo 1;
  }
  else{
    echo 0;
  }



  

}
if (isset($_POST['search_user'])){
  $frm_data=filteration($_POST);
  $query="SELECT * FROM `user_crud`WHERE `name` LIKE ?";

  $res=select($query,["%$frm_data[name]%"],'s');
  $i=1;
  $data="";
  while($row=mysqli_fetch_assoc($res)){

    $del_btn="<button type='button' onclick='remove_user($row[id])' class='btn btn-dark shadow-none'>
    <i class='bi bi-trash'></i></button>";
    $status="<button onclick='toggleStatus($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
    if(!$row['status']){
      $status="<button onclick='toggleStatus($row[id],1)' class='btn btn-danger btn-sm shadow-none'>inactive</button>";


    }
    $date=date("d-m-Y",strtotime($row['date/time']));

    $data.="
    <tr class='align-middle'>
       <td>$i</td>
       <td>$row[name]</td>
       <td>$row[email]</td>
       <td>$row[phonenumber]</td>
       <td>$row[address] | $row[pincode]</td>
       <td>$row[dob]</td>
       <td>$status</td>
       <td>$date</td>
       <td>$del_btn</td>
       
       
         
    </tr>
    
    ";
    $i++;


  }
  echo $data;

}





 