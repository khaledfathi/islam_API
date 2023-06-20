const fileUpload = document.querySelector('#file-upload');
const send = document.querySelector('#send');

/*#####################*/

let dateTime = new Date(); 
console.log(dateTime.toISOString()); 

const offline= 'http://localhost/'; 
const online = 'http://ah.khaledfathi.com/'; 


let data ={
    time : "2020-01-01T10:10",
    user_id : "1",
    title : "dsadsa", 
    abstract : "dsad",
    article : "dsa"
}
function eventtAction (){
    ajax( offline+'api/blog/' , 'post' , data , (fileUpload.value)?fileUpload:null).then((res)=>{
        console.log(res); 
    }); 

}

send.addEventListener('click' , eventtAction);