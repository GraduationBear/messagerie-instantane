

$(document).ready(function() {
    // Ici le DOM est prêt

    //Pour l'actualisation des messages tout les 500 ms
    setInterval('loadmessages()', 20)


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

    let navbar=$("#links a")
    navbar.click(function(e){
        alert($(e.target).text())
    })
})



//fonction permettant la récupération des 10 derniers messages dans la bdd
function loadmessages(){
    $('#discussion').load('recuperer.php');
}

//fonction permettant l'envoi d'un message dans la bdd via Ajax
function envoyermessage(){

    let httpRequest = new XMLHttpRequest()

    //On récupère l'auteur
    let author= $("#auteur").val()

    //On récupère le contenu du message
    let content= $("#contenu").val()

    httpRequest.open('GET','enregistrer.php?auteur='+author+'&contenu='+content,true)
    httpRequest.send(null)

    //Pour permettre de laisser le scroll en bas lorsqu'on converse
    let objDiv = $("#discussion")
    objDiv.scrollTop = objDiv.scrollHeight;



}
