
let HOST_URL = "https://mmi.unilim.fr/~bleuzen1/SAE2.03-Bleuzen";

let DataProfile = {};

DataProfile.add = async function (fdata) {
   
    let config = {
        method: "POST", 
        body: fdata 
    };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addProfile", config);
    let data = await answer.json();
    return data;
}

DataProfile.update = async function (fdata) {
   
    let config = {
        method: "POST", 
        body: fdata 
    };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=updateProfile", config);
    let data = await answer.json();
    return data;
}


DataProfile.read = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfile");
    return await answer.json();
}


export {DataProfile};
