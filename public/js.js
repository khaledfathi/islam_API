const fileUpload = document.querySelector('#file-upload');
const send = document.querySelector('#send');

/*#####################*/

let data = {
    'name':'my product ', 
    'price':433,
    'description':'lllllll',
    'category':'food',
    'user_id' : 1
}
function eventtAction (){
    ajax('http://localhost/api/product/1/update' , 'post' , data , fileUpload).then((res)=>{
        console.log(res); 
    }); 
    // ajax('http://ah.khaledfathi.com/api/user/9/update' , 'post' , data , fileUpload).then((res)=>{
    //     console.log(res); 
    // }); 
}

send.addEventListener('click' , eventtAction);