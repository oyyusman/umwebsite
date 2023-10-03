<?php 
      //for frontened ppuroose data
      define('SITE_URL','http://127.0.0.1/UM WEBSITE/');
      define('ABOUT_IMG_PATH',SITE_URL.'images/about/');
      define('CAROUSEL_IMG_PATH',SITE_URL.'images/carousel/');
      define('FACILITIES_IMG_PATH',SITE_URL.'images/facilities/');
      define('ROOMS_IMG_PATH',SITE_URL.'images/rooms/');




     // method for backend uloading of the image
      define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/UM WEBSITE/images/');
      define('ABOUT_FOLDER','about/');
      define('CAROUSEL_FOLDER','carousel/');
      define('FACILITIES_FOLDER','facilities/');
      define('ROOMS_FOLDER','rooms/');




     function adminlogin(){
        session_start();
        if(!(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true)){
            echo "
            <script>
            window.location.href='index.php';
             </script>";
             exit;
        }
     //    session_regenerate_id(true);
     }
    function redirect($url){
        echo "
        <script>
        window.location.href='$url';
         </script>";
         exit;
    }
   function alert($type,$message){
   $bs_class= ($type=="success")? "alert-success": "alert-danger";
   echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
         <strong class="me-3">$message</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        alert;
   }
function uploadimage($image,$folder){

     $valid_mime=['image/jpeg','image/png','image/webp'];
     $img_mime=$image['type'];
     if(!in_array($img_mime,$valid_mime)){
          // invalid image mime
          return 'inv_img';  
     }
     else if(($image['size']/(1024*1024))>2){
          return 'inv_size';  

     }
     else{
          $ext=pathinfo($image['name'],PATHINFO_EXTENSION);
          $rname='IMG_'.random_int(11111,99999).".$ext";
          $img_path= UPLOAD_IMAGE_PATH.$folder.$rname;
          if (move_uploaded_file($image['tmp_name'],$img_path)){
               return $rname;
          }
          else{
               return 'upd_failed';
          }

     }

}
function deleteImage($image,$folder){
     if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
          return true;
     }
     else{
          return false;
     }
}

function uploadsvg($image,$folder){

     $valid_mime=['image/svg+xml'];
     $img_mime=$image['type'];
     if(!in_array($img_mime,$valid_mime)){
          // invalid image mime
          return 'inv_img';  
     }
     else if(($image['size']/(1024*1024))>1){
          return 'inv_size';  

     }
     else{
          $ext=pathinfo($image['name'],PATHINFO_EXTENSION);
          $rname='IMG_'.random_int(11111,99999).".$ext";
          $img_path= UPLOAD_IMAGE_PATH.$folder.$rname;
          if (move_uploaded_file($image['tmp_name'],$img_path)){
               return $rname;
          }
          else{
               return 'upd_failed';
          }

     }

}

?>