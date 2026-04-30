// URL où se trouve le répertoire "server" sur mmi.unilim.fr
let HOST_URL = "../.."//mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

let DataMovie = {};

DataMovie.requestMovies = async function(valueage = 0){

    let answer = await fetch(HOST_URL + "/server/script.php?todo=readMovies&age=" + valueage);
    let data = await answer.json();
    return data;
}

DataMovie.requestMoviesDetail = async function (id) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readMoviesDetail&id=" + id);
    let data = await answer.json();
    return data;
    
}

export {DataMovie};
