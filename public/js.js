const fileUpload = document.querySelector('#file-upload');
const send = document.querySelector('#send');

/*#####################*/

let data = {
    'name':'islam project', 
    'password':'khaled khaled', 
    'email':'jfsdde948e544325@hj.com',
    'type':'user',
    'phone':'0122443243242342222',
    'fdsf':'54938549'
}
function eventtAction (){
    ajax('http://localhost/api/user/8/update' , 'post' , data , fileUpload).then((res)=>{
        console.log(res); 
    }); 
}

send.addEventListener('click' , eventtAction);