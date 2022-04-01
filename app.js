
$(document).ready(function() {
    // Ici le DOM est prêt


    let defau= getCookie('salle')
    $('#'+defau).css({"color": "#f77f00"})
    //Traitement du changement de salle : lorsqu'on clique sur une salle, on envoie une requête GET à la page recuperer.php
    //et on lui passe le nom de la salle qui seras ajouté à un cookie
    let navbar=$("#links a")

    navbar.click(function(e){
        navbar.css({"color": "white"})
        e.preventDefault()
        let httpRequest = new XMLHttpRequest()
        let salle = $(e.target).text()
        httpRequest.open('GET', 'recuperer.php?salle='+salle,true)
        httpRequest.send(null)
        $(e.target).css({"color": "#f77f00"})
    })


    //traitement du clic sur le boutton Envoyer
    let button = $('#send')
    button.click(function (){
        envoyermessage()
        mes.val('')
    })


    //traitement de l'appui sur la touche entrée dans le champ de saisie du texte
    let mes = $('#contenu')
    mes.keyup(function (e){
        if(e.which===13){
            envoyermessage()
            mes.val('')
        }
    })

    //Pour l'actualisation des messages tout les 500 ms
    setInterval('loadmessages()', 20)
})


//fonction permettant de récupérer un cookie par son nom
function getCookie(cName) {
    const name = cName + "=";
    const cDecoded = decodeURIComponent(document.cookie); //to be careful
    const cArr = cDecoded.split('; ');
    let res;
    cArr.forEach(val => {
        if (val.indexOf(name) === 0) res = val.substring(name.length);
    })
    return res
}

//fonction permettant la récupération des 10 derniers messages dans la bdd
function loadmessages(){
    $('#discussion').load('recuperer.php');
}


//fonction permettant l'envoi d'un message dans la bdd via Ajax
function envoyermessage(){

    let httpRequest = new XMLHttpRequest()

    //On récupère l'auteur
    let session = getCookie('pseudo')

    //On récupère le contenu du message
    let content= $("#contenu").val()

    httpRequest.open('GET','enregistrer.php?auteur='+session+'&contenu='+content,true)
    httpRequest.send(null)

    //Pour permettre de laisser le scroll en bas lorsqu'on converse
    let objDiv = $("#discussion")
    objDiv.scrollTop = objDiv.scrollHeight;

}
