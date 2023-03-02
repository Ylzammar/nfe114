<html>
<head>
<script>
function envoyer(){
    //Récuppération des valeurs saisies pas l'utilisateur
	var rue = document.getElementById('rue').value;
    var ville = document.getElementById('code').value;
    
	//API issu de https://adresse.data.gouv.fr/api-doc/adresse
	
	//Création de l'object Ajax
	var req= new XMLHttpRequest();
    //Préparation de requette
	req.open("GET","https://api-adresse.data.gouv.fr/search/?q="+rue+"&postcode="+ville,false); 
    //Envois de l'information au serveur
	req.send(null); 
    //Reception et affichage du résultat
	var geocodeObjet = JSON.parse(req.responseText);
    
    //Filtre pour récuppérer uniquement les valeurs GPS de l'adresse
    var long = geocodeObjet.features[0].geometry.coordinates[0];
    var lat = geocodeObjet.features[0].geometry.coordinates[1];

    document.getElementById('result').innerHTML="Long "+long+"</br>Lat "+lat;
    
}    
</script>

</head>    
<body>
<p>Adresse <input id="rue"/></p>
<p>Code postal <input id="code"/></p>
<button onclick="envoyer()">Envoyer</button>
<p id="result"></p>

</body>
</html>