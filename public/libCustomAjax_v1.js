/**
 * custom ajax function for backend REST API 
 * @param {string} url 
 * @param {string} method 
 * @param {object} data 
 * @param {Element} filesToUpload 
 * @returns {Promise} json response as object 
 */
async function ajax (url , method='GET' , data={} , filesToUpload=null){
    method  = method.toUpperCase(); 
    //method allowed 
    const methods = ['GET','POST','DELETE','PUT']
    if (!methods.includes(method)){
        throw `ERROR : method ${method} is unknown !`;
    } 
    if (filesToUpload  && method != 'GET' && method != 'DELETE'){
        //set data as dataForm 
        let formData = new FormData(); 
        formData.append('file',filesToUpload.files[0] , 'file');         
        //loop in data for  adding them into the form data 
        for(const key in data){
            formData.set(key ,data[key]); 
        }
        
        //send request 
        const response = await fetch(url, {
            method: method, // GET, POST, PUT, DELETE, etc.
            mode: "cors", // no-cors, *cors, same-origin
            cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
            credentials: "same-origin", // include, *same-origin, omit            
            body: formData 
        });
        return response.json(); 

    }else if (method !='GET' && method != 'DELETE'){
        //send request
        const response = await fetch(url, {
            method: method, 
            mode: "cors", 
            cache: "no-cache", 
            credentials: "same-origin", 
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data)
        });
        return response.json(); 
    }else if (method == 'DELETE'){
        const response = await fetch(url , { method:method });
        return response.json(); 
    }else {
        const response = await fetch(url)
        return response.json(); 
    }
}