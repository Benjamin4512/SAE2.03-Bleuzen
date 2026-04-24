let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();

let templateLiFile = await fetch("./component/Movie/templateLi.html");
let templateLi = await templateLiFile.text();

let Movie = {};

Movie.format = function (data, tab) {
  if (!data || data.length ===0){
    return '<li class="movie__empty">Aucun film disponible pour le moment.</li>'
  }
  let html = template;
  /*html = html.replaceAll("{{cssClass}}");
  html = html.replaceAll("{{moviename}}" , data.name);
  html = html.replaceAll("{{movieimage}}", "../server/images" + data.image); */


 let menuHTML = ""; 
    
    for (let movie of data) {
      let li = templateLi;
      li = li.replaceAll("{{moviename}}", movie.name);
      li = li.replaceAll("{{movieimage}}", "../server/images/" + movie.image);
      menuHTML += li;

    }

    html = html.replaceAll("{{movieItems}}", menuHTML);
  
  return html;
};



export { Movie };