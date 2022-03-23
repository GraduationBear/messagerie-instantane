$(document).ready(function() {
    // Ici le DOM est prêt
    //Pour l'actualisation des messages tout les 500 ms
    setInterval('loadmessages()', 20)

    let mes = $('#contenu')
    //traitement du clic sur le boutton Envoyer
    let button = $('#send')
    button.click(function (){
        envoyermessage()
        mes.val('')
    })

    //traitement de l'appui sur la touche entrée dans le champ de saisie du texte

    mes.keyup(function (e){
        if(e.which===13){
            envoyermessage()
            mes.val('')
        }
    })
})

//fonction permettant la récupération des 10 derniers messages dans la bdd
function loadmessages(){
    $('#messages').load('recuperer.php')
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


}
