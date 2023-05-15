var counter = 1;
setInterval(function(){
	document.getElementById('radio' + counter).checked = true;
	counter++;
	if(counter > 3){
		counter = 1;
	}
}, 5000);


window.addEventListener("scroll", function() {
	var header = document.querySelector(".header");
	header.classList.toggle("bar", window.scrollY > 0);})