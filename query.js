document.body.style.zoom = 1.0

var bd = document.getElementById("wrapper");
var width = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;
if(width<=1500)
bd.style.width=width+"px";
else {bd.style.width="1500px"; width = 1500;}

window.addEventListener('resize', function(event) {
    var width2 = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;

if(width2<=1500)
bd.style.width=width2+"px";
else {bd.style.width="1500px"; width = 1500;}

}, true);


