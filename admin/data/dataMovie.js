
let HOST_URL = "https://mmi.unilim.fr/~bleuzen1/SAE2.03-Bleuzen";

let DataMovie = {};

DataMovie.requestMovies = async function(){
 
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readMovies");

    let data = await answer.json();

    return data;
}

DataMovie.add = async function (fdata) {
   
    let config = {
        method: "POST", 
        body: fdata 
    };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addMovie", config);
    let data = await answer.json();
    return data;
}

DataMovie.requestFilm = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readCategory");
    let data = await answer.json();
    return data;

}

export {DataMovie};




