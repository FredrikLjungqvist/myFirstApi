window.addEventListener("load", initSite)
document.getElementById("saveBtn").addEventListener("click", setDate)
document.getElementById("updateBtn").addEventListener("click", updateData)
document.getElementById("deleteBtn").addEventListener("click", deleteData)

function initSite() {
    getData()
}



async function setDate() {
    const dateToSave = document.getElementById("input").value
    if(!dateToSave.length){
        alert("Skriv in ett datum")
        return
    }
    const body = new FormData()
    body.set("date", dateToSave)
    


    const setDate = await makeRequest("./server/addHoroscope.php", "POST", body)
    console.log(setDate)
    getData()

}

async function getData() {
    const dateText = document.getElementById("output")
    const collectedDate = await makeRequest("./server/viewHoroscope.php", "GET")
    dateText.innerText = ""
    dateText.innerHTML= ("<h2>"+collectedDate+"</h2>")
    if(collectedDate){
        document.getElementById("saveBtn").disabled = true;
        document.getElementById("updateBtn").disabled = false;
        document.getElementById("deleteBtn").disabled = false;
    }else{
        document.getElementById("saveBtn").disabled = false;
        document.getElementById("updateBtn").disabled = true;
        document.getElementById("deleteBtn").disabled = true;
}

}
async function deleteData() {
    const response = await makeRequest("./server/deleteHoroscope.php", "DELETE")
    console.log(response)
    getData()
}
async function updateData() {
    const dateToSave = document.getElementById("input").value
    if(!dateToSave.length){
        alert("Skriv in ett datum")
        return
    }
    const body = new FormData()
    body.set("date", dateToSave)
    const checkDate = await makeRequest("./server/updateHoroscope.php", "POST", body)
    console.log(checkDate)
    getData()
}



async function makeRequest(path, method, body) {
    try{
        const response = await fetch(path, {method, body})
        
        return response.json()
        

    }catch(err){
        console.error(err)
    }
}