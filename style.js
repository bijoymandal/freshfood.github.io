function openmenu()
		{
			document.getElementById("side-menu").style.display="block";
			document.getElementById("menu-btn").style.display="none";
			document.getElementById("close-btn").style.display="block";
		}
		function closemenu()
		{
			document.getElementById("side-menu").style.display="none";
			document.getElementById("menu-btn").style.display="block";
			document.getElementById("close-btn").style.display="none";
		}
/*login window toggle*/ 
		var a = document.getElementById("login");
		var b = document.getElementById("reg");
		var c = document.getElementById("btn");
		function register()
		{
			a.style.left = "-400px";
			b.style.left = "50px";
			c.style.left = "110px";
		}
		function login()
		{
			a.style.left = "50px";
			b.style.left = "450px";
			c.style.left = "0";
		}
/*accordion*/
var acc = document.getElementsByClassName("accordion1");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}		