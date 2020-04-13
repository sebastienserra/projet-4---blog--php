//insertion d'un nouvel element contenant le texte du tableau
const nouvelElement=document.createElement("div");
let elt=document.getElementById("container");
elt.appendChild(nouvelElement);
// element ajoute dans le DOM
// modif sur l element
nouvelElement.classList.add("texte");
let interdiapoBis;

let tableauImages = [
{source:'./public/images/alaska_img1.jpg', texte:'Un billet simple pour l\'Alaska'},
{source:'./public/images/alaska_img2.jpg', texte:''},
{source:'./public/images/alaska_img3.jpg', texte:''},
{source:'./public/images/alaska_img4.jpg', texte: ''}
];

let i = 0; //index, image et texte de depart
nouvelElement.innerHTML = tableauImages[i].texte;//je place la ligne apres le tableau pour que i soit pris en compte

let diapo= document.getElementById('diapo');
let time = 5000;
let playing = false;
// Creation Objet Diaporama

let diaporama = {

lancementAuto: function lancementAuto(){
	
var interdiapo = setInterval(diaporama.imageDroite,time);
interdiapoBis = interdiapo;
	console.log(interdiapo); 
},
// defilement des images avec la fleche de droite
appelClicDroit : function clicDroit (){
let droite= document.getElementsByClassName('demi_cercle_droite')[0];

droite.addEventListener('click', function(){

		diaporama.imageDroite();

	});

},

imageDroite : function changeImagesDroite(){
 
	if (i < tableauImages.length-1){
		i ++;
		diapo.src = tableauImages[i].source;
		nouvelElement.innerHTML=tableauImages[i].texte;//cette ligne me permet de synchroniser texte et image
	} else {
		i=0;
		diapo.src = tableauImages[i].source;
		nouvelElement.innerHTML=tableauImages[i].texte;
	}

},
// defilement des images avec la fleche de gauche
appelClicGauche : function clicGauche(){
let gauche= document.getElementsByClassName('demi_cercle_gauche')[0]; 

	gauche.addEventListener('click', function(){

	diaporama.imageGauche();

  });

},

imageGauche : function changeImagesGauche(){ 
	if (i>0){
		i--;
		diapo.src = tableauImages[i].source; 
 		nouvelElement.innerHTML=tableauImages[i].texte;
 	} else {
 		i=3;
 		diapo.src = tableauImages[i].source;
 		nouvelElement.innerHTML=tableauImages[i].texte;
 	}
 },

//mise en pause et relance du diaporama
appelPause: function faireUnePause(){
	boutonPause= document.getElementById('contient_pause');
	boutonPlay = document.getElementById('contient_play');

	boutonPause.addEventListener('click', function(){
	if(playing === false){ 
		clearInterval(interdiapoBis); console.log('stop it!'); console.log(playing);
		interdiapoBis = 0;
		playing = true;
		boutonPause.style.visibility = "hidden";
		boutonPlay.style.visibility = "visible";

	}else{ 
		
		diaporama.lancementAuto(); console.log('play it!');console.log(playing);
		playing = false;
		boutonPlay.style.visibility = "hidden";
		boutonPause.style.visibility = "visible";
	} 
});
	boutonPlay.addEventListener('click', function(){
	if(playing === false)
	{ 
		clearInterval(interdiapoBis); console.log('stop it!'); console.log(playing);
		interdiapoBis = 0;
		playing = true;
		boutonPause.style.visibility = "hidden";
		boutonPlay.style.visibility = "visible";

	}else{ 
		playing=false;
		diaporama.lancementAuto(); console.log('play it!');console.log(playing);
		
		boutonPlay.style.visibility = "hidden";
		boutonPause.style.visibility = "visible";
	} 
});

},

// touches clavier: fleches droite et gauche
flecheDroiteClavier : function flecheDroite (){
	
	window.addEventListener("keydown", function(clef){
	if(clef.keyCode == "39"){
		clearInterval(interdiapoBis);
		diaporama.imageDroite();
	}
});

},
flecheGaucheClavier: function flecheGauche(){

	window.addEventListener("keydown", function(clef){
	if(clef.keyCode == "37"){
		clearInterval(interdiapoBis);
		diaporama.imageGauche();
	}
});
},
};//fin objet diaporama