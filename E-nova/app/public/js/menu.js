var menu=document.querySelector('.menu_profile');
var btn=document.querySelector('.bouton');
var desactive=document.querySelector('.desactive');

	desactive.style.display="none"

var add=function(){
	desactive.style.display="block"
	menu.classList.toggle('active');
}
var remove= function(){	
	menu.classList.toggle('active');
	desactive.style.display="none"
}

btn.addEventListener('click',add);
desactive.addEventListener('click',remove);



