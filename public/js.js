const fileUpload = document.querySelector('#file-upload');
const send = document.querySelector('#send');

/*#####################*/

let dateTime = new Date(); 
console.log(dateTime.toISOString()); 

let data ={
    'name':'ds',
    'email':'dsad22ds@fdksk',
    'phone':'ds',
    'address': 'dsadasdsa',
    'type':'user',
    'password':'password',
}
function eventtAction (){
    // ajax('http://localhost/api/user/2/update' , 'post' , data , (fileUpload.value)?fileUpload:null).then((res)=>{
    //     console.log(res); 
    // }); 



}

send.addEventListener('click' , eventtAction);