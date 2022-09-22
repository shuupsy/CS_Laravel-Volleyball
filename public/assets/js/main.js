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
let volleyLeft = document.querySelector('#volley-left')
let volleyRight = document.querySelector('#volley-right')

function volley_scroll() {
    let y = (document.documentElement).scrollTop / 1.5
    volleyLeft.style.transform = "translate3d(" + y/30 + "px," + y + "px,0px"
    volleyRight.style.transform = "translate3d(-" + y/5 + "px,-" + y/3 + "px,0px"
}

window.addEventListener("scroll", () => {
    nav_scroll();
    volley_scroll();
})
