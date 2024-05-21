function empty(){
    let x = 2;
    for(x = 2; x < document.getElementsByTagName('td').length; x = x + 5){
        let td = document.getElementsByTagName('td')[x];
        if(Number(td.textContent) == 0){
            td.style.backgroundColor = 'red';
        }
        else if(Number(td.textContent) >= 1 && Number(td.textContent) <= 5){
            td.style.backgroundColor = 'yellow';
        }
        else{
            td.style.backgroundColor = 'honeydew';
        }
    }
}
function update(x){
    let td = x.getElementsByTagName('td')[2];
    td.textContent = prompt("Podaj nową ilość");
    empty();
}
let  id_zamowienia = 0;
function order(x){
    let td = x.getElementsByTagName('td');
        let a = td[0].textContent;
        alert("Zamówienie nr: " + id_zamowienia + " Produkt: " + a);
}