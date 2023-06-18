const fileUpload = document.querySelector('#file-upload');
const send = document.querySelector('#send');

/*#####################*/

let dateTime = new Date(); 
console.log(dateTime.toISOString()); 

const offline= 'http://localhost/'; 
const online = 'http://ah.khaledfathi.com/'; 


let data ={
    user_id:2, 
    'time':'2050-02-02 20:19',
    'title':'lkds',
    'abstract':'kfsjdkf',
    'article': 'kgjf',
}
function eventtAction (){
    ajax( (online+'api/blog/3/update') , 'post' , data , (fileUpload.value)?fileUpload:null).then((res)=>{
        console.log(res); 
    }); 

}

send.addEventListener('click' , eventtAction);