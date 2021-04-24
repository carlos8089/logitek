var tab = [
        {title:'mivacaisse', desc:'gestion', price:'200$'},
        {title:'logitek', desc:'library', price:'30£'},
        {title:'confeo', desc:'telecom', price:'500$'},
        {title:'assitrh', desc:'crm', price:'300$'},
        {title:'easypay', desc:'e-payment', price:'free'},
        {title:'', desc:'', price:''},
        {title:'', desc:'', price:''},
    ];
const grid = document.querySelector('#grill');
var gridElement;
tab.forEach(element => {
    grid.append(
    gridElement=document.createElement("div"),
    gridElement.setAttribute("class", "col-4 card"),
    gridElement.innerHTML=element.title
    );
});