let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let templateLiFile = await fetch("./component/NavBar/templateLi.html");
let templateLi = await templateLiFile.text();

let NavBar = {};

NavBar.format = function (hAbout, hHome, profiles) {
  let html = template;
  html = html.replace("{{hHome}}", hHome);
  html = html.replace("{{hAbout}}", hAbout);

let menuHTML ="";
 for (let profile of profiles){
  let li = templateLi;
  li = li.replaceAll("{{profilename}}", profile.nom)
  li = li.replaceAll("{{id}}", profile.id); 
  li = li.replaceAll("{{age}}", profile.age_restriction);
  menuHTML += li;
 }

html = html.replaceAll("{{profileItems}}", menuHTML);

  return html;
};

export { NavBar };
