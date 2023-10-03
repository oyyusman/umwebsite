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
    <title>Admin Panel -Carousel</title>

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
                <h3 class="mb-4">CAROUSEL</h3>
                <!--Carousel  session  -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title mg-0">Images</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                               <i class="bi bi-plus-square"></i>  Add
                            </button>
                        </div>
                        <div class="row" id="carousel-data">
                            
                            

                        </div>

                    </div>
                </div>  

                <!-- Carousel session model -->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="carousel_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Image</h5>
                                </div>
                                <div class="modal-body">

                                    <div class=" mb-3">
                                        <label class="form-label fw-bold">Picture</label>
                                        <input type="file" name="member_picture" id="member_picture_inp" class="form-control  shadow-none" accept=".jpg,.png,.webp,.jpeg" required>


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="member_picture.value=''" class="btn text-secondary shadow-none " data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit"  class="btn custom-bg text-white shadow-none  ">SUBMIT</button>
                                </div>
                            </div>
                        </form>

                    </div>


                </div>

                




            </div>
        </div>
    </div>
 <!-- Modal session start -->
 <!-- model session end -->
<!-- shutdown session start -->


<?php require('component/script.php') ?>
<script src="script/carousel.js"></script>

</body>

</html>