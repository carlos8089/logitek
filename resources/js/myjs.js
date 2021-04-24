document.querySelector('#tradeType').addEventListener('click', function() {
    if ((document.getElementById('tradeType').value=='rent') === true) {
    document.getElementById('currencies').disabled=false;
    document.getElementById('amount').disabled=false;
    }else {
        document.getElementById('currencies').disabled=true;
    document.getElementById('amount').disabled=true;
    }
})
document.querySelector('#sol-create-form').addEventListener('submit', function(){
    //le message est affiché juste avant le rechargement de la page; test avec debugger; trouver le moyen de modifier le contenu de la notif en javascript
    //document.querySelector('#notif-success').JSON.stringfy('accepted');
    //document.querySelector('#notif-success').hidden=false;
    //debugger
    alert('New solution successfully added')
})