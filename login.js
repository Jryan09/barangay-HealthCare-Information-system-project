var l = document.getElementById("login");
var r = document.getElementById("register");
var z = document.getElementById("btn");
var b = document.getElementById("tgbtn");
var b1 = document.getElementById("tgbtn2");

function register() {
    l.style.left = "-400px";
    r.style.left = "50px";
    z.style.left = "110px";
    b.style.color = "white";
    b1.style.color = "white";
}
function login() {
    l.style.left = "50px";
    r.style.left = "450px";
    z.style.left = "0";
    b.style.color = "white";
    b1.style.color = "white";
};
var bot = document.getElementById('sh');
let e = document.getElementById('form');
var t = document.getElementById('ttl');
bot.addEventListener("click", function () {
    if (e.style.display==="none" ) {
      
          e.style.display='block';
          t.style.display='none';
       
    }
    else{
        
e.style.display="none";
    }
 

    
})