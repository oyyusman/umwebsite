<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>*FACILITIES*</title>
    <?php require('component/links.php') ?>
    <style>
        .h-line{
    width: 150px;
    margin:  0 auto;
    height: 1.7px;
    
}
     .pop:hover{
        border-top-color: #2ec1ac !important;
        transform: scale(1.03);
        transition: all 0.3s;
     }
    </style>
    
</head>

<body class="bg-light">
      
    <?php require('component/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
         <div class="h-line bg-dark"></div>
         <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Consectetur nesciunt <br> a alias aliquid corporis ea dolorem veniam, 
            hic sapiente beatae.</p>
    </div>
    <div class="container">
        <div class="row">
            <?php

            $res=selectAll('facilities');
            $path=FACILITIES_IMG_PATH;
            while($row=mysqli_fetch_assoc($res)){
                echo<<<data
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="$path$row[icon]" width="40px" alt="">
                        <h5 class="m-0 ms-3">$row[name]</h5>
                    </div>
                
                    <p>$row[description]</p>
                </div>
            </div>

            data;
            }


            ?>
 
        </div>
    </div>
    <!-- footer session start -->
    <?php require('component/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
    
</body>

</html>