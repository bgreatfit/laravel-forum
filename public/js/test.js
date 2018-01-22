
function display(name) {
     name = name || 'Your name Here';
    console.log('Hello' + name);
}
display('jj');
var childWindow = "";
var newTabUrl="http://localhost:8081/app/home";

function openNewTab(){
    childWindow = window.open(newTabUrl);
}

function refreshExistingTab(){
    childWindow.location.href=newTabUrl;
}
