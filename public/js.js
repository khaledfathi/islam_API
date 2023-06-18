const fileUpload = document.querySelector('#file-upload');
const send = document.querySelector('#send');

/*#####################*/

let dateTime = new Date(); 
console.log(dateTime.toISOString()); 

let data ={
    user_id:1, 
    'time':'2050-02-02 20:19',
    'title':'1111111',
    'abstract':'11111',
    'article': '11111',
}
function eventtAction (){
    ajax('http://localhost/api/blog/15/update' , 'post' , data , (fileUpload.value)?fileUpload:null).then((res)=>{
        console.log(res); 
    }); 

}

send.addEventListener('click' , eventtAction);