let templateFile = await fetch("./component/MovieFeatured/template.html");
let template = await templateFile.text();

let templateLiFile = await fetch("./component/MovieFeatured/templateLi.html");
let templateLi = await templateLiFile.text();

let MovieFeatured = {};

MovieFeatured.format = function (data) {
  if (!data || data.length ===0){
    return '<li class="movie__empty-featured">Aucun film mis en avant pour le moment.</li>'
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


    html = html.replaceAll("{{movieItems}}", menuHTML);
  
  return html;
};



export { MovieFeatured };