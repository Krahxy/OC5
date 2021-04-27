// DECLARATION DE VARIABLES
let menuToDrop = document.getElementsByClassName("menuToDrop")[0];
let drop = document.getElementsByClassName("drop")[0];

let cantineDropImgMars = document.getElementById("cantineDropImgMars");
let imgMenuMars = document.getElementsByClassName('mars')[0];

let cantineDropImgFevrier = document.getElementById("cantineDropImgFevrier");
let imgMenuFevrier = document.getElementsByClassName('fevrier')[0];

// EVENTS
if (menuToDrop) {menuToDrop.addEventListener('click', menuDropped);}
if (cantineDropImgMars) {cantineDropImgMars.addEventListener('click', displayMenuMars);}
if (cantineDropImgFevrier) {cantineDropImgFevrier.addEventListener('click', displayMenuFevrier);}

function menuDropped() {
    if (drop.style.display === "block") {
        drop.style.display = "none";
    } else {
        drop.style.display = "block";
    }
};

function displayMenuMars() {
    if (imgMenuMars.style.display === "block") {
        imgMenuMars.style.display = "none";
    } else {
        imgMenuMars.style.display = "block";
    }
};

function displayMenuFevrier() {
    if (imgMenuFevrier.style.display === "block") {
        imgMenuFevrier.style.display = "none";
    } else {
        imgMenuFevrier.style.display = "block";
    }
};

$(document).ready(function(){
	$('.mainBurgerBtn').click(function(){
		$('#expandedMenu').toggleClass('isOpen');
	});
});

$(document).ready(function(){
	$('.burgerButton').click(function(){
		$('.burger').toggleClass('isOpen');
	});
});