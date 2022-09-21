let header = document.querySelector('header')
let nav = document.querySelector('nav')
let main_pos = document.querySelector('main').offsetTop
let navLinks = document.querySelectorAll('.navLink')

function nav_scroll() {
    let x = window.scrollY;
    if (x > main_pos) {
        nav.classList.add('bg-[#f8f7ff]')
        nav.classList.add('fixed')
        nav.classList.add('top-0')
    } else {
        nav.classList.remove('bg-[#f8f7ff]')
        nav.classList.remove('fixed')
        nav.classList.remove('top-0')
    }
}

window.addEventListener("scroll", nav_scroll)
