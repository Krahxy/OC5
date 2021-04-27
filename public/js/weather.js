let meteoTemp = document.getElementById('meteoTemp');
let meteoType = document.getElementById('meteoType');
let meteoIcon = document.getElementById('meteoIcon');

function init() {
	
	const request = new XMLHttpRequest(); // Lancement de la requête
    request.open("GET", "http://api.openweathermap.org/data/2.5/weather?lat=50&lon=2&lang=fr&units=metric&appid=85a75c632290763cfc3a468def4c1911"); // On récupère l'adresse de l'API
	request.send(); // On envoi la requête

    request.onreadystatechange = function() { // On attend un edit du status, retour de requête.
        if (this.readyState == XMLHttpRequest.DONE && this.status == 200) { // On check si les données renvoyées soient complètes avec le status " 200 " (valide), 400 : error.
			let req = JSON.parse(this.responseText); // On récupère les données en format json afin quelle soit " lisible en objet "
			meteo = {
				"temp" : 	req.main.temp,
				"type" :	req.weather[0].description,
				"icon" :	req.weather[0].icon
			};
			meteoTemp.innerHTML = Math.round(meteo.temp) + "°C"; // On ajout le °C à notre degrès de température
			meteoType.innerHTML = meteo.type.charAt(0).toUpperCase() + meteo.type.slice(1); // On ajoute une majuscule à notre type de météo
			meteoIcon.innerHTML = "<img src='http://openweathermap.org/img/wn/10d@2x.png'/>"; // On insère l'icone adéquat au type
			console.log(meteo.icon)
		} else {
			console.log("Pas encore prête")
		}
    };
}