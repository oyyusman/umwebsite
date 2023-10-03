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
    <title>Admin panel - Rooms Queries</title>

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
                <h3 class="mb-4">Rooms Queries</h3>
                <!--feature  session  -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                               <i class="bi bi-plus-square"></i>  Add
                            </button>
                        </div>
                        

                            <div class="table-responsive-lg" style="height: 450px; overflow-y:scroll">
                                <table class="table table-hover border text-center ">
                                        <thead>
                                            <tr class="bg-dark text-light">
                                                   <th scope="col">#</th>
                                                   <th scope="col">Name</th>
                                                   <th scope="col">Area</th>
                                                   <th scope="col">Guests</th>
                                                   <th scope="col">Price</th>
                                                   <th scope="col">Quantity</th>
                                                   <th scope="col">Status</th>
                                                   <th scope="col" width="20%">Action</th>


                                            </tr>
                                        </thead>
                                    <tbody id="room-data">
                                    </tbody>
                                </table>
                            </div>

                    </div>
                  
                </div>  
  
            </div>
        </div>
    </div>

<!-- Rooms model -->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="add_room_form" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Room</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input type="text" name="name" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <label class="form-label fw-bold">Area</label>
                                            <input type="number" min="1" name="area" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Price</label>
                                            <input type="number"  min="1" name="price" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           <label class="form-label fw-bold">Quantity</label>
                                            <input type="number"  min="1" name="quantity" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Adult(MAX.)</label>
                                            <input type="number"  min="1" name="adult" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Children(MAX.)</label>
                                            <input type="number"  min="1" name="children" class="form-control  shadow-none" required>
                                        </div>
                                        <div class=" col-12 mb-3">
                                           <label class="form-label fw-bold">Features</label>
                                           <div class="row">
                                             <?php
                                               $res = selectAll('feature');
                                               while($opt = mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                           <label>
                                                              <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                              $opt[name]

                                                                 
                                                              
                                                           
                                                           </label>
                                                            
                                                        </div>
                                                    ";
                                                }
                                             ?>
                                           </div>



                                        </div>
                                        <div class=" col-12 mb-3">
                                           <label class="form-label fw-bold">Facilities</label>
                                           <div class="row">
                                             <?php
                                               $res = selectAll('facilities');
                                               while($opt = mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                           <label>
                                                              <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                              $opt[name]
                                                            </label>
                                                            
                                                        </div>
                                                    ";
                                                }
                                             ?>
                                           </div>



                                        </div>
                                        <div class="col-12 mb-3">
                                           <label class="form-label fw-bold">Description</label>
                                           <textarea name="desc" rows="04" class="form-control shadow-none" required ></textarea>

                                        </div>

                                    </div>



                                    

                                    

                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn text-secondary shadow-none " data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit"  class="btn custom-bg text-white shadow-none  ">SUBMIT</button>
                                </div>
                            </div>
                        </form>

                    </div>


    </div>

    <!-- Edit room model -->
    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="edit_room_form" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Room details</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input type="text" name="name" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                             <label class="form-label fw-bold">Area</label>
                                            <input type="number" min="1" name="area" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Price</label>
                                            <input type="number"  min="1" name="price" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                           <label class="form-label fw-bold">Quantity</label>
                                            <input type="number"  min="1" name="quantity" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Adult(MAX.)</label>
                                            <input type="number"  min="1" name="adult" class="form-control  shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Children(MAX.)</label>
                                            <input type="number"  min="1" name="children" class="form-control  shadow-none" required>
                                        </div>
                                        <div class=" col-12 mb-3">
                                           <label class="form-label fw-bold">Features</label>
                                           <div class="row">
                                             <?php
                                               $res = selectAll('feature');
                                               while($opt = mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                           <label>
                                                              <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                                              $opt[name]

                                                                 
                                                              
                                                           
                                                           </label>
                                                            
                                                        </div>
                                                    ";
                                                }
                                             ?>
                                           </div>



                                        </div>
                                        <div class=" col-12 mb-3">
                                           <label class="form-label fw-bold">Facilities</label>
                                           <div class="row">
                                             <?php
                                               $res = selectAll('facilities');
                                               while($opt = mysqli_fetch_assoc($res)){
                                                    echo"
                                                        <div class='col-md-3 mb-1'>
                                                           <label>
                                                              <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                                              $opt[name]
                                                            </label>
                                                            
                                                        </div>
                                                    ";
                                                }
                                             ?>
                                           </div>



                                        </div>
                                        <div class="col-12 mb-3">
                                           <label class="form-label fw-bold">Description</label>
                                           <textarea name="desc" rows="04" class="form-control shadow-none" required ></textarea>

                                        </div>
                                        <input type="hidden" name="room_id">

                                    </div>



                                    

                                    

                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn text-secondary shadow-none " data-bs-dismiss="modal">CANCEL</button>
                                    <button type="submit"  class="btn custom-bg text-white shadow-none  ">SUBMIT</button>
                                </div>
                            </div>
                        </form>

                    </div>


    </div>

    <!-- manages image room model -->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Room Name</h5>
                       <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="image-alert">

                        </div>

                        <div class="border-bottom border-3 pb-3 mb-3">
                            <form id="add_image_form">
                                <label class="form-label fw-bold">Add Image</label>
                                <input type="file" name="image" accept=".jpg,.png,.webp,.jpeg" class="form-control shadow-none mb-3" required >
                                <button class="btn custom-bg text-white shadow-none  ">ADD</button>
                                <input type="hidden" name="room_id">

                                 

                             

                            </form>
                         </div>
                    </div>
                    <div class="table-responsive-lg" style="height: 350px; overflow-y:scroll">
                                <table class="table table-hover border text-center ">
                                        <thead>
                                            <tr class="bg-dark text-light sticky-top">
                                                   <th scope="col" width="60%">Image</th>
                                                   <th scope="col">Thumb</th>
                                                   <th scope="col">Delete</th>


                                            </tr>
                                        </thead>
                                    <tbody id="room-image-data">
                                    </tbody>
                                </table>
                    </div>

                    
                </div>
            </div>
    </div>



<?php require('component/script.php') ?>
<script>
    let add_room_form=document.getElementById('add_room_form');
    add_room_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_room();
    });

function add_room(){
        
    // FormData interface for pictures
    let data=new FormData();
    data.append('add_room','');
    data.append('name',add_room_form.elements['name'].value);
    data.append('area',add_room_form.elements['area'].value);
    data.append('price',add_room_form.elements['price'].value);
    data.append('quantity',add_room_form.elements['quantity'].value);
    data.append('adult',add_room_form.elements['adult'].value);
    data.append('children',add_room_form.elements['children'].value);
    data.append('desc',add_room_form.elements['desc'].value);

    let features=[];
    add_room_form.elements['features'].forEach(el =>{
        if(el.checked){
            features.push(el.value);
        }

    });
    // checking which fiacilities are avialbae
    let facilities=[];
    add_room_form.elements['facilities'].forEach(el =>{
        // those facilities which are checked are push into facilities list which are initally empty
        if(el.checked){
            facilities.push(el.value);
        }

    });
    data.append('features',JSON.stringify(features));
    data.append('facilities',JSON.stringify(facilities));
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/rooms.php", true);
    // header of post request for picture important
    xhr.onload = function() { 
     // // hiding the model via javascript
        var myModal = document.getElementById('add-room')
        var modal = bootstrap.Modal.getInstance(myModal);

        modal.hide();
        if(this.responseText==1){
            alert('success','new room added');
            add_room_form.reset();
            get_all_rooms();

            
        }
        else{
            alert('error','Server down');
        }
    }
    xhr.send(data);


}

function get_all_rooms(){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // header of post request for picture important
    xhr.onload = function() { 
        document.getElementById('room-data').innerHTML=this.responseText;

        
    }
    xhr.send('get_all_rooms');

}
let edit_room_form=document.getElementById('edit_room_form');
function edit_details(id){
    
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // header of post request for picture important
    xhr.onload = function() { 
        let data=JSON.parse(this.responseText);
        edit_room_form.elements['name'].value=data.roomdata.name;
        edit_room_form.elements['area'].value=data.roomdata.area;
        edit_room_form.elements['price'].value=data.roomdata.price;
        edit_room_form.elements['quantity'].value=data.roomdata.quantity;
        edit_room_form.elements['adult'].value=data.roomdata.adult;
        edit_room_form.elements['children'].value=data.roomdata.children;
        edit_room_form.elements['desc'].value=data.roomdata.description;
        edit_room_form.elements['room_id'].value=data.roomdata.id;

        edit_room_form.elements['facilities'].forEach(el =>{
        // those facilities which are checked are push into facilities list which are initally empty
        if(data.facilities.includes(Number(el.value))){
            el.checked=true;
        }

        });

        edit_room_form.elements['features'].forEach(el =>{
        // those facilities which are checked are push into facilities list which are initally empty
        if(data.features.includes(Number(el.value))){
            el.checked=true;
        }

        });





    
    }
    xhr.send('get_room='+id);

}

edit_room_form.addEventListener('submit',function(e){
        e.preventDefault();
        submit_edit_room();
});
function submit_edit_room(){
        
        // FormData interface for pictures
        let data=new FormData();
        data.append('edit_room','');
        data.append('room_id',edit_room_form.elements['room_id'].value)
        data.append('name',edit_room_form.elements['name'].value);
        data.append('area',edit_room_form.elements['area'].value);
        data.append('price',edit_room_form.elements['price'].value);
        data.append('quantity',edit_room_form.elements['quantity'].value);
        data.append('adult',edit_room_form.elements['adult'].value);
        data.append('children',edit_room_form.elements['children'].value);
        data.append('desc',edit_room_form.elements['desc'].value);
    
        let features=[];
        edit_room_form.elements['features'].forEach(el =>{
            if(el.checked){
                features.push(el.value);
            }
    
        });
        // checking which fiacilities are avialbae
        let facilities=[];
        edit_room_form.elements['facilities'].forEach(el =>{
            // those facilities which are checked are push into facilities list which are initally empty
            if(el.checked){
                facilities.push(el.value);
            }
    
        });
        data.append('features',JSON.stringify(features));
        data.append('facilities',JSON.stringify(facilities));
        let xhr = new XMLHttpRequest();
        // true for ashyronous function
        xhr.open("POST", "ajax/rooms.php", true);
        // header of post request for picture important
        xhr.onload = function() { 
         // // hiding the model via javascript
            var myModal = document.getElementById('edit-room')
            var modal = bootstrap.Modal.getInstance(myModal);
    
            modal.hide();
            if(this.responseText==1){
                alert('success','room data edited');
                edit_room_form.reset();
                get_all_rooms();
    
                
            }
            else{
                alert('error','Server down');
            }
        }
        xhr.send(data);
    
    
    }

    let add_image_form=document.getElementById('add_image_form');
    add_image_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_image();
    });

function add_image(){
    // FormData interface for pictures
    let data=new FormData();
    // file 0 mean that only first image selected will be choosen
    data.append('image',add_image_form.elements['image'].files[0]);
    data.append('room_id',add_image_form.elements['room_id'].value);

    data.append('add_image','');

    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/rooms.php", true);
    // header of post request for picture important


    xhr.onload = function() {
    
        if(this.responseText=='inv_img'){
            alert('error','ONLY jpg  pNJ or webp picture are allowed','image-alert');
        }
        else if(this.innerText=='inv_size'){
            alert('error','Images should be less than 2MB','image-alert');
        }
        else if(this.responseText=='upd_failed'){
            alert('error', 'Image uploaded failed Server error','image-alert');
        }
        else{
            alert('success','New image added','image-alert','image-alert');
            room_images(add_image_form.elements['room_id'].value,document.querySelector("#room-images .modal-title").innerText);
            add_image_form.reset();

            


        }

        


    }
    xhr.send(data);


}

function room_images(id,rname){
    document.querySelector("#room-images .modal-title").innerText=rname;
    add_image_form.elements['room_id'].value=id;
    add_image_form.elements['image'].value='';

    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // header of post request for picture important
    xhr.onload = function() { 
        document.getElementById('room-image-data').innerHTML=this.responseText;
      

        
    }
    xhr.send('get_room_images='+id);


    




}




function toggleStatus(id,val){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // header of post request for picture important
    xhr.onload = function() { 
      if(this.responseText==1){
          alert('success','Status toggled:');
          get_all_rooms();
      }
      else{
        alert('error','server is down');
      }

        
    }
    xhr.send('toggleStatus='+id+'&value='+val);

}

function rem_image(img_id,room_id){
    // FormData interface for pictures
    let data=new FormData();
    // file 0 mean that only first image selected will be choosen
    data.append('image_id',img_id);
    data.append('room_id',room_id);

    data.append('rem_image','');

    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/rooms.php", true);
    // header of post request for picture important


    xhr.onload = function() {
    
        if(this.responseText == 1){
            alert('success','Image Romoved','image-alert');
            room_images(room_id,document.querySelector("#room-images .modal-title").innerText);

        }
        
        else{
            alert('error','Image Removal failed','image-alert');
            

            


        }

    }

        

     
}
function remove_room(room_id){
    // FormData interface for pictures
    if(confirm("are you sure to want to delete this room")){
        let data= new FormData();
        data.append('room_id',room_id);
        data.append('remove_room','');
        let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/rooms.php", true);
    // header of post request for picture important


    xhr.onload = function() {
    
        if(this.responseText == 1){
            alert('alert','room successfully removed');
            get_all_rooms();


        }
        
        else{
            alert('error','room Removal failed');
            

            


        }




    }
    xhr.send(data);
    // file 0 mean that only first image selected will be choosen


    

    }

        

     
}

window.onload=function(){
    get_all_rooms();
}
        
    

</script>



</body>

</html>