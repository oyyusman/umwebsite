<?php
     require('Admin/component/db_config.php');
     require('Admin/component/essentials.php');
     

     $contact_q="SELECT * FROM `contact_details` WHERE `sr_no`=?";
     $values=[1];
     $contact_r= mysqli_fetch_assoc( select ($contact_q,$values,'i'));
    //  print_r($contact_r);
    // $setting_q= mysqli_fetch_assoc( select ($contact_q,$values,'i'));
    $setting_q="SELECT * FROM `settings` WHERE `sr_no`=?";
    $setting_r= mysqli_fetch_assoc( select ($setting_q,$values,'i'));



 
     
     
      

?>
<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top ">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><?php echo $setting_r['site_title'] ?></a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2"  href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="about.php">About</a>
                </li>

            </ul>
            <div class="d-flex">
                 <?php
                session_start();
                if(isset($_SESSION['login'])&& $_SESSION['login']==true){
                    echo<<<data
                     
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                      $_SESSION[uName]
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                        <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>

                    data;

                }
                else{

                    echo<<<data

                         <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModel">
                             Login 
                        </button>
                        <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 " data-bs-toggle="modal" data-bs-target="#registerModel">
                           Register 
                        </button>

                    data;

                }
                
                ?> 

                
            </div>
        </div>
    </div>
</nav>


<!-- Modal -->
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

<div class="modal fade" id="registerModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register_form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i>
                        User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge bg-light rounded-pill mb-3 text-dark text-wrap lh-base ">
                        your details must be correct
                    </span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label ">Name</label>
                                <input name="name" type="text" class="form-control  shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Email </label>
                                <input name="email" type="email" class="form-control  shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label ">Phone no</label>
                                <input name="phonenumber" type="number" class="form-control  shadow-none" required>
                            </div>
                            
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label ">Pincode</label>
                                <input name="pincode" type="number" class="form-control  shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Date of birth</label>
                                <input name="dob" type="date" class="form-control  shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label ">Password</label>
                                <input name="password" type="password" class="form-control  shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input name="cpassword" type="password" class="form-control  shadow-none" required>
                            </div>
                            
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>

                            </div>
                            <div class="text-center my-1">
                                <Button class="btn btn-dark shadow-none">Register</Button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</div>