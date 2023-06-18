const dateTime = document.getElementById('date-time') 

function getCurrentTime(){
    //get date
    const timeNow = new Date(); 
    //format 
    let date = (timeNow.getDate()<10)?"0"+timeNow.getDate():timeNow.getDate();
    let month = (timeNow.getMonth()<10)?"0"+timeNow.getMonth():timeNow.getMonth();
    let year = timeNow.getFullYear();
    let hours = (timeNow.getHours()<10)?"0"+timeNow.getHours():timeNow.getHours();
    let minutes = (timeNow.getMinutes()<10)?"0"+timeNow.getMinutes():timeNow.getMinutes();
    return `${year}-${month}-${date}T${hours}:${minutes}`; 
}

// console.log('ok'); 
dateTime.value = getCurrentTime(); 
console.log(getCurrentTime()); 

