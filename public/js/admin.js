// DECLARATION DES VARIABLES
let actualityContent = document.getElementsByClassName("actualityContent")[0];
let createActualityBtn = document.getElementById('createActualityBtn');

let usersList = document.getElementsByClassName("usersList")[0];
let displayUsersBtn = document.getElementById('displayUsersBtn');

let modalViews = document.getElementsByClassName("modalView");

// DECLARATION DES EVENTS
if (actualityContent) {createActualityBtn.addEventListener('click', displayActualityContent);}
if (usersList) {displayUsersBtn.addEventListener('click', displayUsers);}

function displayActualityContent() {

    for (let i = 0; i < modalViews.length; i++) {
        modalViews[i].style.display = 'none';
    }

    actualityContent.style.display = "block";
}

function displayUsers() {

    for (let i = 0; i < modalViews.length; i++) {
        modalViews[i].style.display = 'none';
    }

    usersList.style.display = "block";
}

