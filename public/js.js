const fileUpload = document.querySelector('#file-upload');
const send = document.querySelector('#send');

/*#####################*/

// let data = {
//     name:'khaled',
//     price:1989800,
//     description:'lllllllll',
//     category:'toys',
//     user_id:1
// }
let data ={
    'name':'ds',
    'email':'dsad22ds@fdksk',
    'phone':'ds',
    'address': 'dsadasdsa',
    'type':'user',
    'password':'password',
}
function eventtAction (){
    ajax('http://localhost/api/user/2/update' , 'post' , data , (fileUpload.value)?fileUpload:null).then((res)=>{
        console.log(res); 
    }); 
    // ajax('http://ah.khaledfathi.com/api/user/9/update' , 'post' , data , fileUpload).then((res)=>{
    //     console.log(res); 
    // }); 
}

send.addEventListener('click' , eventtAction);