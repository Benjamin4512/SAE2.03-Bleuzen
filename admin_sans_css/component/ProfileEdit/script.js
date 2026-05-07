

let templateFile = await fetch("./component/ProfileEdit/template.html");
let template = await templateFile.text();


let templateLiFile = await fetch("./component/ProfileEdit/templateLi.html");
let templateLi = await templateLiFile.text();


let ProfileEdit = {};

ProfileEdit.format = function(data, handler){
    let html = template;
    let listprofile = "";
    
    for (let EditProfile of data){ 
        let li = templateLi;
        
 
        li = li.replaceAll('{{id}}', EditProfile.id);
        li = li.replaceAll("{{profilesname}}", EditProfile.nom); 
        
        listprofile += li;
    }

    html = html.replaceAll('{{handler}}', handler);
    html = html.replaceAll('{{optionprofile}}', listprofile);
    return html;
}

export { ProfileEdit };

