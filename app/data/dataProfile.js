// URL où se trouve le répertoire "server" sur mmi.unilim.fr
let HOST_URL = "..";//"http://mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

let DataProfile = {};

DataProfile.requestProfile = async function(){

    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfile");
    let data = await answer.json();
    return data;
}


DataProfile.activeAge = 0; // tout public par défaut

export { DataProfile }
