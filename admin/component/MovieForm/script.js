

let templateFile = await fetch("./component/MovieForm/template.html");
let template = await templateFile.text();


let templateLiFile = await fetch("./component/MovieForm/templateLi.html");
let templateLi = await templateLiFile.text();


let MovieForm = {};

MovieForm.format = function(data, handler){
    let html = template;
    let listfilm ="";
    for (let category of data){
        let li = templateLi
   
    li = li.replaceAll('{{id}}', category.id);
    li = li.replaceAll("{{categoryName}}",category.name );
    listfilm += li;
    }

    html = html.replaceAll('{{handler}}', handler);
    html = html.replaceAll('{{optioncategory}}', listfilm);
        return html;

  
}


export {MovieForm};

