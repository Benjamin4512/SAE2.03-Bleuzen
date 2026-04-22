let templateFile = await fetch("./component/Movies/template.html");
let template = await templateFile.text();

let Movies = {};

NavBar.format = function (hAbout, hHome) {
  let html = template;
  html = html.replace("{{hAbout}}", hAbout);
  return html;
};

export { NavBar };