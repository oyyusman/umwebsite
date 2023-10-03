<?php
    $hname='localhost';
    $uname='root';
    $password='';
    $db='umwebsite';

   $con= mysqli_connect($hname,$uname,$password,$db);
   if(!$con){
    die("can not connect to datasbe".mysqli_connect_error());
   }

//    function to filters the input from the user

   function filteration($data){
    foreach($data as $key => $value){
     $value =trim($value);
     $value =stripslashes($value);
     $value =htmlspecialchars($value);
     $value =strip_tags($value);

     $data[$key]=$value;

    }
    return $data;
   }

   function selectAll($table){
    $con=$GLOBALS['con'];
    $res=mysqli_query($con,"SELECT * FROM $table");
    return $res;


   }
//    function for select query
   function select ($sql,$values,$datatypes){
       $con = $GLOBALS['con'];
       if($stmt = mysqli_prepare($con,$sql)){
        // ... is splat operator it combines the value the array after and bind it to the other
        // splat operator dynamically bind the values
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)) {
         $res= mysqli_stmt_get_result($stmt);
         mysqli_stmt_close($stmt);
         return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("query cannnot be executed  - Select");
        }
        
       }
       else{
        die("query cannnot be prepared  - Select");
       }
   }

//    update function
function update ($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
     // ... is splat operator it combines the value the array after and bind it to the other
     // splat operator dynamically bind the values
     mysqli_stmt_bind_param($stmt,$datatypes,...$values);
     if(mysqli_stmt_execute($stmt)) {
        // how many rows will be affected (how many will be changed)
      $res= mysqli_stmt_affected_rows($stmt);
      mysqli_stmt_close($stmt);
      return $res;
     }
     else{
         mysqli_stmt_close($stmt);
         die("query cannnot be executed  - update");
     }
     
    }
    else{
     die("query cannnot be prepared  - update");
    }
}

function insert ($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
     // ... is splat operator it combines the value the array after and bind it to the other
     // splat operator dynamically bind the values
     mysqli_stmt_bind_param($stmt,$datatypes,...$values);
     if(mysqli_stmt_execute($stmt)) {
        // how many rows will be affected (how many will be changed)
      $res= mysqli_stmt_affected_rows($stmt);
      mysqli_stmt_close($stmt);
      return $res;
     }
     else{
         mysqli_stmt_close($stmt);
         die("query cannnot be executed  - insert");
     }
     
    }
    else{
     die("query cannnot be prepared  - insert");
    }
}
function delete ($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
     // ... is splat operator it combines the value the array after and bind it to the other
     // splat operator dynamically bind the values
     mysqli_stmt_bind_param($stmt,$datatypes,...$values);
     if(mysqli_stmt_execute($stmt)) {
        // how many rows will be affected (how many will be changed)
      $res= mysqli_stmt_affected_rows($stmt);
      mysqli_stmt_close($stmt);
      return $res;
     }
     else{
         mysqli_stmt_close($stmt);
         die("query cannnot be executed  - deleted");
     }
     
    }
    else{
     die("query cannnot be prepared  - deleted");
    }
}


  
 ?>