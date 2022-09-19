/* Ouverture / Fermeture formulaire Equipe */
let new_team = document.querySelector('#new_team')
let team_form = document.querySelector('#team_form')
let close_team_form = document.querySelector('#close_team_form')

new_team.addEventListener('click', () => {
    team_form.classList.remove('hidden')
})
close_team_form.addEventListener('click', () => {
    team_form.classList.add('hidden')
})
