// URL où se trouve le répertoire "server" sur mmi.unilim.fr
let HOST_URL = "https://mmi.unilim.fr/~bleuzen1/SAE2.03-Bleuzen"//mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

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

DataMovie.addFavoris = async function (id_profile, id_movie) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addFavoris&id_profile=" + id_profile + "&id_movie=" + id_movie);
    let data = await answer.json();
    return data;
};

DataMovie.readFavoris = async function (id_profile) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readFavoris&id_profile=" + id_profile);
    let data = await answer.json();
    return data;
};

DataMovie.deleteFavoris = async function (id_profile, id_movie) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=deleteFavoris&id_profile=" + id_profile + "&id_movie=" + id_movie);
    let data = await answer.json();
    return data;
};

DataMovie.readFeatured = async function (age) {
  let answer = await fetch(HOST_URL + "/server/script.php?todo=readFeatured&age=" + age);
  let data = await answer.json();
  return data;
}




export {DataMovie};
