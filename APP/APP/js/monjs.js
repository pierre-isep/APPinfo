// sfHover = function() {
//     var sfEls = document.getElementById("nav").getElementsByTagName("LI");
//     for (var i=0; i<sfEls.length; i++) {
//         sfEls[i].onmouseover=function() {
//             this.className+=" sfhover";
//         }
//         sfEls[i].onmouseout=function() {
//             this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
//         }
//     }
// }
// if (window.attachEvent) window.attachEvent("onload", sfHover);




var divPrecedent=document.getElementById('ajout_pièce_caché');
function visibilite(divId)
{
    divPrecedent.style.display='none';
    divPrecedent=document.getElementById(divId);
    divPrecedent.style.display='';
}


function invisibilite(divId)
{
    divPrecedent=document.getElementById(divId);
    divPrecedent.style.display='none';
}

