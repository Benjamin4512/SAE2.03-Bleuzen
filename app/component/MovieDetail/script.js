let templateFile = await fetch("./component/MovieDetail/template.html");
let template = await templateFile.text();

let templateLiFile = await fetch("./component/MovieDetail/templateLi.html");
let templateLi = await templateLiFile.text();



let MovieDetail = {};

MovieDetail.format = function (data, favoris) {
    let html = template;
    let menuHTML = "";

    for (let movie of data) {
        let li = templateLi;

        li = li.replaceAll("{{moviedetailname}}", movie.name);
        li = li.replaceAll("{{moviedetaildirector}}", movie.director);
        li = li.replaceAll("{{moviedetailimage}}", "../server/images/" + movie.image);
        li = li.replaceAll("{{moviedetailyear}}", movie.year);
        li = li.replaceAll("{{moviedetailcategory}}", movie.category_name);
        li = li.replaceAll("{{moviedetailminage}}", movie.min_age);
        li = li.replaceAll("{{moviedetaildescription}}", movie.description);
        li = li.replaceAll("{{moviedetailtrailer}}", movie.trailer);

        
       let alreadyFavoris = false;

        if (favoris && favoris.length > 0) {
            for (let fav of favoris) {
                if (fav.id == movie.id) {
                    alreadyFavoris = true;
                    break;
                }
            }
        }

        if (alreadyFavoris) {

            li = li.replaceAll("{{moviedetailicontrash}}", "../server/images/icon/trash.svg");
            li = li.replaceAll("C.handlerDeleteFavoris()", "C.handlerDeleteFavoris(" + movie.id + ")");
            li = li.replaceAll("{{retirerfavoris}}", "Retirer ce film de vos favoris");
            
            li = li.replaceAll("{{moviedetailiconlike}}", "");
            li = li.replaceAll("{{mettrefavoris}}", "");
            li = li.replaceAll("C.handlerAddFavoris()", "#");
        } else {

            li = li.replaceAll("{{moviedetailiconlike}}", "../server/images/icon/player-heart.svg");
            li = li.replaceAll("C.handlerAddFavoris()", "C.handlerAddFavoris(" + movie.id + ")");
            li = li.replaceAll("{{mettrefavoris}}", "Ajouter ce film a vos favoris");

            li = li.replaceAll("{{moviedetailicontrash}}", "");
            li = li.replaceAll("{{retirerfavoris}}", "");
            li = li.replaceAll("C.handlerDeleteFavoris()", "#");
        }

        menuHTML += li;
    }

    html = html.replaceAll("{{moviedetailItems}}", menuHTML);
    return html;
};

export { MovieDetail };