let templateFile = await fetch("./component/MovieDetail/template.html");
let template = await templateFile.text();

let templateLiFile = await fetch("./component/MovieDetail/templateLi.html");
let templateLi = await templateLiFile.text();

let MovieDetail = {};

MovieDetail.format = function (data) {
 
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
      li = li.replaceAll("{{moviedetailicon}}", "../server/images/icon/player-heart.svg");
      li = li.replaceAll("C.handlerAddFavoris()", "C.handlerAddFavoris(" + movie.id + ")");
      menuHTML += li;

    }

    html = html.replaceAll("{{moviedetailItems}}", menuHTML);
  
  return html;
};



export { MovieDetail };