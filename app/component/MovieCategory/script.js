let templateFile = await fetch("./component/MovieCategory/template.html");
let template = await templateFile.text();

let templateLiFile = await fetch("./component/MovieCategory/templateLi.html");
let templateLi = await templateLiFile.text();

let MovieCategory = {};

MovieCategory.format = function (data, tab) {
  if (!data || data.length ===0){
    return '<li class="movie__empty">Aucun film disponible pour le moment.</li>'
  }
  let html = template; 


 let menuHTML = ""; 
    
    for (let movie of data) {
      let li = templateLi;
      li = li.replaceAll("{{moviename}}", movie.name);
      li = li.replaceAll("{{movieimage}}", "../server/images/" + movie.image);
      li = li.replaceAll("{{id}}", movie.id);

      menuHTML += li;

    }

    html = html.replaceAll("{{moviecategoryItems}}", menuHTML);
  
  return html;
};



export { Movie };