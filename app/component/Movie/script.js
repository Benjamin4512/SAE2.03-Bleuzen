let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();

let Movie = {};

Movie.format = function (data, tab) {
  let html = template;
 /* html = html.replaceAll("{{cssClass}}", css);
  html = html.replaceAll("{{moviename}}" , data.name);
  html = html.replaceAll("{{movieimage}}", "../server/images" + data.image);*/

  let menuHTML = "";
    for (let i of data.items) {
      let li = templateLi;
      li = li.replaceAll("{{moviename}}", data.name);
      li = li.replaceAll("{{movieimage}}", "../server/images" + data.image);
      menuHTML += li;

    }

    html = html.replaceAll("{{movieItems}}", menuHTML);
  
  return html;
};

export { Movie };