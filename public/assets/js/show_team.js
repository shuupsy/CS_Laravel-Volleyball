let pays = document.querySelector('.pays');
let list = pays.classList

switch(true) {
    case (list.contains('Europe')) :
        pays.style.backgroundImage = "url('/assets/img/europe-removebg.png')";
        pays.style.backgroundColor = "rgb(156, 219, 255, .2)"
        break;
    case (list.contains('Asie')) :
        pays.style.backgroundImage = "url('/assets/img/asie-removebg.png')";
        pays.style.backgroundColor = "rgb(251, 195, 188, .2)"
        break;
    case (list.contains('Afrique')) :
        pays.style.backgroundImage = "url('/assets/img/afrique-removebg.png')";
        pays.style.backgroundColor = "rgb(209, 247, 162, .2)"
        break;
    case (list.contains('Amérique')) :
        pays.style.backgroundImage = "url('/assets/img/amerique2-removebg.png')";
        pays.style.backgroundColor = "rgb(255, 180, 107, .2)"
        break;
    case (list.contains('Océanie')) :
        pays.style.backgroundImage = "url('/assets/img/oceanie-removebg.png')";
        pays.style.backgroundColor = "rgb(210, 199, 255, .2)"
        break;
}
