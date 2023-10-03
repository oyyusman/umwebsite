
let feature_s_form = document.getElementById('feature_s_form');
let facility_s_form = document.getElementById('facility_s_form');

feature_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    add_feature();
});
facility_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    add_facility();
});

 


function add_feature(){
    // FormData interface for pictures
    let data=new FormData();
    data.append('name',feature_s_form.elements['feature_name'].value);
    data.append('add_feature','');

    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/features_facilities.php", true);
    // header of post request for picture important
    xhr.onload = function() {
     // // hiding the model via javascript
        var myModal = document.getElementById('feature-s')
        var modal = bootstrap.Modal.getInstance(myModal);

        modal.hide();
        if(this.responseText==1){
            alert('success','new feature added');
            feature_s_form.elements['feature_name'].value='';
            get_features();
        }
        else{
            alert('error','Server down');
        }
    }
    xhr.send(data);


}


function get_features(){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        document.getElementById('features-data').innerHTML=this.responseText;
        

    }
    xhr.send('get_features');


}
function rem_feature(val){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if(this.responseText==1){
            alert('success','feature removed');
            get_features();

        }
        else if(this.responseText == 'room_added'){
            alert('error','Feature is added in room');
        }
        else{
            alert('error','Server down');
        }
     }
    xhr.send('rem_feature='+val);



}
function add_facility(){
    // FormData interface for pictures
    let data=new FormData();
    data.append('name',facility_s_form.elements['facility_name'].value);
    data.append('icon',facility_s_form.elements['facility_icon'].files[0]);
    data.append('desc',facility_s_form.elements['facility_desc'].value);

    data.append('add_facility','');

    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/features_facilities.php", true);
    // header of post request for picture important
    xhr.onload = function() {
     // // hiding the model via javascript
        var myModal = document.getElementById('facility-s')
        var modal = bootstrap.Modal.getInstance(myModal);

        modal.hide();
        if(this.responseText=='inv_img'){
            alert('error','ONLY SVG picture are allowed');
        }
        else if(this.innerText=='inv_size'){
            alert('error','Images should be less than 1MB');
        }
        else if(this.responseText=='upd_failed'){
            alert('error', 'Image uploaded failed Server error');
        }
        else{
            alert('success','New facility added');
            facility_s_form.reset();
            get_facility();

            
            // get_members();


        }
    }
    xhr.send(data);


}
function get_facility(){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        document.getElementById('facility-data').innerHTML=this.responseText;
        

    }
    xhr.send('get_facility');


}
function rem_facility(val){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if(this.responseText==1){
            alert('success','facility removed');
            get_facility();

        }
        else if(this.responseText=='room added'){
            alert('error','Facility is added in room');
        }
        else{
            alert('error','Server down');
        }
     }
    xhr.send('rem_facility='+val);



}
window.onload=function(){
    get_features();
    get_facility();
}



