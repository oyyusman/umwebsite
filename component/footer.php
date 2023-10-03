<style>
    .custom-alert {
    position: fixed;
    top: 80px;
    right: 25px;
    z-index: 1111;
}
</style>
<div class="container-fluid bg-white mt-4">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2"><?php echo $setting_r['site_title'] ?></h3>
            <p>
            <?php echo  $setting_r['site_about'] ?>
                
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Iusto nostrum alias dolorum perferendis ex laborum dolores
                minima aperiam sint quos esse velit, iste
                consectetur quis tenetur eos numquam enim non!
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">LINKS</h5>
            <a href="index.php" class="d-inline-block mb-3 text-dark text-decoration-none">HOME</a> <br>
            <a href="rooms.php" class="d-inline-block mb-3 text-dark text-decoration-none">FACILITES</a> <br>
            <a href="facilities.php" class="d-inline-block mb-3 text-dark text-decoration-none">ROOMS</a> <br>
            <a href="contact.php" class="d-inline-block mb-3 text-dark text-decoration-none">CONTACT US</a> <br>
            <a href="about.php" class="d-inline-block mb-3 text-dark text-decoration-none">ABOUT</a>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">FOLLOW US</h5>
            <?php
            if($contact_r['tweet']!=''){
                echo<<<data
                    <a href=" $contact_r[tweet]" target="_blank" class="d-inline-block  mb-2 text-dark text-decoration-none">
                          <i class="bi bi-twitter me-1"></i> Twitter
                    </a>
            
                        <br>
                    <a href="$contact_r[fb]" target="_blank" class="d-inline-block  mb-2 text-dark text-decoration-none">
                             <i class="bi bi-facebook me-1"></i> Facebook
                    </a>
                           <br>
                    <a href=" $contact_r[insta]" target="_blank" class="d-inline-block  mb-2 text-dark text-decoration-none">
                          <i class="bi bi-instagram me-1"></i> Instagram
                     </a>

                data;

            }
            ?>
            
        </div>
    </div>
</div>

<h6 class="text-center bg-dark text-white p-3 m-0">DESIGNED AND DEVELOPED BY MUHAMMAD USMAN</h6>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    // function for active classes
   function setActive(){
    let navbar = document.getElementById('nav-bar');
    let a_tags = navbar.getElementsByTagName('a');
    for(i=0;i<a_tags.length;i++){
        let file=a_tags[i].href.split('/').pop();
        let file_name=file.split('.')[0];
        if(document.location.href.indexOf(file_name)>=0){
            a_tags[i].classList.add('active');

        }

    }

   }
   function alert(type,message,position='body'){
        let bs_class=(type == 'success')? 'alert-success':'alert-danger';
        let element=document.createElement('div');
        element.innerHTML=`
        <div class="alert ${bs_class}  alert-dismissible fade show" role="alert">
         <strong class="me-3">${message}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;
        if(position=='body'){
            document.body.append(element);
            element.classList.add('custom-alert')
             
        }
        else{
            document.getElementById(position).appendChild(element);
        }
        
        setTimeout(remAlert,3000);
    }
    function remAlert(){
        document.getElementsByClassName('alert')[0].remove();
    }
   let register_form=document.getElementById('register_form');
   register_form.addEventListener('submit',function(e){
    e.preventDefault();
    let data=new FormData();
    data.append('name',register_form.elements['name'].value);
    data.append('address',register_form.elements['address'].value);
    data.append('phonenumber',register_form.elements['phonenumber'].value);
    data.append('pincode',register_form.elements['pincode'].value);
    data.append('dob',register_form.elements['dob'].value);
    data.append('password',register_form.elements['password'].value);
    data.append('email',register_form.elements['email'].value);


    data.append('cpassword',register_form.elements['cpassword'].value);
    
    data.append('register','');
    var myModal= document.getElementById('registerModel');
    var modal=bootstrap.Modal.getInstance(myModal);
    modal.hide();
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/login_register.php", true);
    xhr.onload = function(){
        if(this.responseText=='pass_mismatch'){
            alert('error',"password mismatched");
        }
        else if(this.responseText=='email_already'){
            alert('error',"email is already registered");

        }
        else if(this.responseText=='phone_already'){
            alert('error',"phone no is already registered");

        }
        else if(this.responseText=='enc_failed'){
            alert('error',"Registration failed server dwon");


        }
        else{
            alert('success','registration successful');
            register_form.reset();
        }

        
    }
    xhr.send(data);
     })



    let login_form=document.getElementById('login_form');
    login_form.addEventListener('submit',function(e){
    e.preventDefault();
    let data=new FormData();
    data.append('email_mob',login_form.elements['email_mob'].value);
    data.append('pass',login_form.elements['pass'].value);
    
    data.append('login','');
    var myModal= document.getElementById('loginModel');
    var modal=bootstrap.Modal.getInstance(myModal);
    modal.hide();
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/login_register.php", true);
    xhr.onload = function(){
        if(this.responseText == 'invalid_mobile_no'){
            alert('error',"invalid email or mobile no");
        }
        else if(this.responseText == 'inactive'){
            alert('error',"Account is suspended! please contact admin");

        }
        else if(this.responseText == 'invalid_pass'){
            alert('error',"incorrect password");

        }
        else{
            let fileurl=window.location.href.split('/').pop().split('?').shift();
            if(fileurl == 'room_details.php'){
                window.location=window.location.href;
            }
            else{
            window.location=window.location.pathname;
            }
            
        }

        
    }
    xhr.send(data);
    
     });

    function checklogintobook(status,room_id){
        if(status){
            window.location.href='confirm_booking.php?id='+room_id;
        }
        else{
            alert('error','please login to book room')
        }

    }
   
   
   
     setActive();




</script>