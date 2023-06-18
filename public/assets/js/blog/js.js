const dateTime = document.getElementById('date-time') 

function getCurrentTime(){
    //get date
    const timeNow = new Date(); 
    //format 
    let date = (timeNow.getDate()<10)?"0"+timeNow.getDate():timeNow.getDate();
    let month = (timeNow.getMonth()<10)?"0"+timeNow.getMonth():timeNow.getMonth();
    let year = timeNow.getFullYear();
    let hours = timeNow.getHours();
    let minutes = timeNow.getMinutes();
    return `${year}-${month}-${date} ${hours}:${minutes}`; 
}

// console.log('ok'); 
dateTime.value = getCurrentTime(); 
console.log(getCurrentTime()); 

