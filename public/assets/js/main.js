/* let defaultTransform = 0;
function goNext() {
    defaultTransform = defaultTransform - 398;
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
next.addEventListener("click", goNext);
function goPrev() {
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
    else defaultTransform = defaultTransform + 398;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
prev.addEventListener("click", goPrev); */


/* Ouverture formulaire Equipe */
let new_team = document.querySelector('#new_team')
let team_form = document.querySelector('#team_form')
let close_team_form = document.querySelector('#close_team_form')

new_team.addEventListener('click', () => {
    team_form.classList.remove('hidden')
})
close_team_form.addEventListener('click', () => {
    team_form.classList.add('hidden')
})
