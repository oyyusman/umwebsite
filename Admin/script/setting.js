
let general_data, contacts_data;
let general_s_form=document.getElementById('general_s_form');
let site_title_inp = document.getElementById('site_title_inp');
let site_about_inp = document.getElementById('site_about_inp');
let contacts_s_form = document.getElementById('contacts_s_form');
let team_s_form = document.getElementById('team_s_form');
let member_name_inp=document.getElementById('member_name_inp');
let member_picture_inp=document.getElementById('member_picture_inp');




function get_general() {
    let site_title = document.getElementById('site_title');
    let site_about = document.getElementById('site_about');
    let shutdown_toggle= document.getElementById('shutdown-toggle');

    // create new xhml request
    // this is all ajax portion
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        general_data = JSON.parse(this.responseText);
        // fetching data from general data and display into fileds
        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;
        // showing data to form from the fields
        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;
        

        if(general_data.shutdown==0){
            shutdown_toggle.checked=false;
            shutdown_toggle.value=0;
        }
        else{
            shutdown_toggle.checked=true;
            shutdown_toggle.value=1;
        }

    }
    xhr.send('get_general');


}


general_s_form.addEventListener('submit',function(e){
    // default behaviour of form is submit and refresh
    e.preventDefault();
    udp_general(site_title_inp.value,site_about_inp.value);

})
// udp function

function udp_general(site_title_val, site_about_val) {
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/setting_crud.php", true);
    // header of post request 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {

        // hiding the model via javascript
        var myModal = document.getElementById('general-s')
        var modal = bootstrap.Modal.getInstance(myModal);

        modal.hide();
        if (this.responseText == 1) {
            // if data is updated show the changes in the page by calling get_general method
            alert('success', 'Changes saved!')
            get_general();
        } else {
            alert('error', 'no changes made!')
        }


    }
    xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&udp_general');


}


function upd_shutdown(val){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/setting_crud.php", true);
    // header of post request 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {

        if (this.responseText == 1 && general_data.shutdown==0 ) {
            // if data is updated show the changes in the page by calling get_general method
            alert('success', 'Site has been shutdown!')
            
        } else {
            alert('success', 'shutdwon mode off!')
        }
        get_general();


    }
    xhr.send('upd_shutdown='+val);



}
// contact info
function get_contacts() {

    let contacts_p_id=['address','gmap','pn1','pn2','email','fb','insta','tweet'];
    let iframe=document.getElementById('iframe');

    // create new xhml request
    // this is all ajax portion
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
         contacts_data = JSON.parse(this.responseText);
         contacts_data=Object.values(contacts_data);


         for(i=0;i<contacts_p_id.length;i++){
            // this for loop is for fetching data
            document.getElementById(contacts_p_id[i]).innerText=contacts_data[i+1];
         }
         iframe.src=contacts_data[9]
         contacts_inp(contacts_data);
        

    }
    xhr.send('get_contacts');


}
function contacts_inp(data){
    let contact_inp_id=['address_inp','gmap_inp','pn1_inp','pn2_inp','email_inp','fb_inp','insta_inp','tweet_inp','iframe_inp'];
    for(i=0;i<contact_inp_id.length;i++){
        document.getElementById(contact_inp_id[i]).value=data[i+1];
    }


}

contacts_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    upd_contacts();
})

function upd_contacts(){
    let index=['address','gmap','pn1','pn2','email','fb','insta','tweet','iframe']
    let contacts_inp_id=['address_inp','gmap_inp','pn1_inp','pn2_inp','email_inp','fb_inp','insta_inp','tweet_inp','iframe_inp']
    let data_str="";
    for(i=0;i<index.length;i++){
        data_str += index[i]+ "=" + document.getElementById(contacts_inp_id[i]).value + '&';
    }
    // console.log(data_str);
    data_str += "upd_contacts";
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        var myModal = document.getElementById('contacts_s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1 ) {
            // if data is updated show the changes in the page by calling get_general method
            alert('success', 'Changes saved!');
            get_contacts();
            
        } 
        else {
            alert('error', 'No Changes made!')
        }
     

    }
    xhr.send(data_str);


}

team_s_form.addEventListener('submit',function(e){
    e.preventDefault();
    add_member();
});

function add_member(){
    // FormData interface for pictures
    let data=new FormData();
    data.append('name',member_name_inp.value);
    // file 0 mean that only first image selected will be choosen
    data.append('picture',member_picture_inp.files[0]);
    data.append('add_member','');

    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/setting_crud.php", true);
    // header of post request for picture important


    xhr.onload = function() {
    

        // // hiding the model via javascript
        var myModal = document.getElementById('team-s')
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
            alert('success','New member added');
            member_name_inp.value='';
            member_picture_inp.value='';
            get_members();


        }

        


    }
    xhr.send(data);


}
function get_members(){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        document.getElementById('team-data').innerHTML=this.responseText;
        

    }
    xhr.send('get_members');


}


// function for deleting image
function rem_member(val){
    let xhr = new XMLHttpRequest();
    // true for ashyronous function
    xhr.open("POST", "ajax/setting_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if(this.responseText==1){
            alert('success','Member removed');
            get_members();

        }
        else{
            alert('error','Server down');
        }
     }
    xhr.send('rem_member='+val);



}




window.onload = function() {
    get_general();
    get_contacts();
    get_members();

}
