/* Navbar */
let nav = document.querySelector('nav')
let header_pos = document.querySelector('header').offsetTop

function nav_scroll() {
    let x = window.scrollY;
    if (x > header_pos) {
        nav.classList.add('bg-[#f8f7ff]')
        nav.classList.add('fixed')
        nav.classList.add('top-0')
    } else {
        nav.classList.remove('bg-[#f8f7ff]')
        nav.classList.remove('fixed')
        nav.classList.remove('top-0')
    }
}

/* Volleyball left */
let volley = document.querySelector('#volley-left')

function volley_scroll() {
    let y = (document.documentElement).scrollTop 
    volley.style.transform = "translate3d(0px," + y + "px,0px"
}

window.addEventListener("scroll", () => {
    nav_scroll();
    volley_scroll();
})
