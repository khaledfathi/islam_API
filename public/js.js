const fileUpload = document.querySelector('#file-upload');
const send = document.querySelector('#send');

/*#####################*/

let dateTime = new Date(); 
console.log(dateTime.toISOString()); 

const offline= 'http://localhost/'; 
const online = 'http://ah.khaledfathi.com/'; 


let data ={
    user_id:1,
    name:"32",
    phone:432,
    address:"43",
    working_hours:"dsa",
    description:"dsa",
    service_type:"clinics",
    approval:"approved"
}
function eventtAction (){
    ajax( offline+'api/service/1/update' , 'post' , data , (fileUpload.value)?fileUpload:null).then((res)=>{
        console.log(res); 
    }); 

}

send.addEventListener('click' , eventtAction);