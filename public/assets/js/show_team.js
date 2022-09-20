let pays = document.querySelectorAll('.pays');

pays.forEach(item => {
    switch(true) {
        case (item.classList.contains('Europe')) :
            item.style.backgroundImage = "url('/assets/img/europe-removebg.png')";
            item.style.backgroundColor = "rgb(156, 219, 255, .2)"
            break;
        case (item.classList.contains('Asie')) :
            item.style.backgroundImage = "url('/assets/img/asie-removebg.png')";
            item.style.backgroundColor = "rgb(251, 195, 188, .2)"
            break;
        case (item.classList.contains('Afrique')) :
            item.style.backgroundImage = "url('/assets/img/afrique-removebg.png')";
            item.style.backgroundColor = "rgb(209, 247, 162, .2)"
            break;
        case (item.classList.contains('Amérique')) :
            item.style.backgroundImage = "url('/assets/img/amerique2-removebg.png')";
            item.style.backgroundColor = "rgb(255, 180, 107, .2)"
            break;
        case (item.classList.contains('Océanie')) :
            item.style.backgroundImage = "url('/assets/img/oceanie-removebg.png')";
            item.style.backgroundColor = "rgb(210, 199, 255, .2)"
            break;
    }

})
