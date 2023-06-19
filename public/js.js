const fileUpload = document.querySelector('#file-upload');
const send = document.querySelector('#send');

/*#####################*/

let dateTime = new Date(); 
console.log(dateTime.toISOString()); 

const offline= 'http://localhost/'; 
const online = 'http://ah.khaledfathi.com/'; 


let data ={
    'name':'fdsf',
    'email':'qq@qq',
    'password':'password',
    'type':'user'

}
function eventtAction (){
    ajax( offline+'api/service/2' , 'delete' , data , (fileUpload.value)?fileUpload:null).then((res)=>{
        console.log(res); 
    }); 

}

send.addEventListener('click' , eventtAction);