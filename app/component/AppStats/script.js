let templateFile = await fetch("./component/AppStats/template.html");
let template = await templateFile.text();

let AppStats = {};

AppStats.format = function (data) {
  let html = template;


  html = html.replaceAll("{{number_profile}}", data[0].total);
  html = html.replaceAll("{{avg_favoris}}", data[1].average_by_favoris);
  html = html.replaceAll("{{number_movie}}", data[2].all_movie);
  html = html.replaceAll("{{popular_movie}}", data[3].name);
  html = html.replaceAll("{{popular_category}}", data[4].name);

  return html;
};


export { AppStats };