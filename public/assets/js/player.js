/* Ouverture / Fermeture formulaire Joueurs */
let new_player = document.querySelector('#new_player')
let player_form = document.querySelector('#player_form')
let close_player_form = document.querySelector('#close_player_form')

new_player.addEventListener('click', () => {
    player_form.classList.remove('hidden')
})
close_player_form.addEventListener('click', () => {
    player_form.classList.add('hidden')
})
