const download = document.querySelector('#download'); 
const msgBox = document.querySelector('#msg-box'); 

const request = async ()=>{
    response = await fetch (window.location.origin+'/backup/export'); 
    return   response.json();
}
function eventDownload(event){
    msgBox.style.display="block";
    request().then((res)=>{
        window.location=res.link; 
        msgBox.style.display="none";
        console.log(res)
    });
}
download.addEventListener('click' , eventDownload); 