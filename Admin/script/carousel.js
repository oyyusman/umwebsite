
let carousel_s_form = document.getElementById('carousel_s_form');
let carousel_picture_inp=document.getElementById('carousel_picture_inp');


carousel_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    add_image();
});

function add_image(){
    // FormData interface for pictures
    let data=new FormData();
    // file 0 mean that only first image selected will be choosen
    data.append('picture',carousel_picture_inp.files[0]);
    data.append('add_image','');

    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/carousel_crud.php", true);
    // header of post request for picture important


    xhr.onload = function() {
    

        // // hiding the model via javascript
        var myModal = document.getElementById('carousel-s')
        var modal = bootstrap.Modal.getInstance(myModal);

        modal.hide();
        if(this.responseText=='inv_img'){
            alert('error','ONLY jpg and pNJ picture are allowed');
        }
        else if(this.innerText=='inv_size'){
            alert('error','Images should be less than 2MB');
        }
        else if(this.responseText=='upd_failed'){
            alert('error', 'Image uploaded failed Server error');
        }
        else{
            alert('success','New image added');
            carousel_picture_inp.value='';
            get_carousel();


        }

        


    }
    xhr.send(data);


}
function get_carousel(){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        document.getElementById('carousel-data').innerHTML=this.responseText;
        

    }
    xhr.send('get_carousel');


}


// function for deleting image
function rem_image(val){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if(this.responseText==1){
            alert('success','Image removed');
            get_carousel();

        }
        else{
            alert('error','Server down');
        }
     }
    xhr.send('rem_image='+val);



}




window.onload = function() {
   get_carousel();

}
