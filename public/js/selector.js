function tous() {
    let id1 = document.getElementById('1')
    let id2 = document.getElementById('2')
    let id3 = document.getElementById('3')
    let idAll = [id1, id2, id3]
    idAll.forEach(function (id) {
        id.classList.remove('filtreVitrine')

    })
    id2.classList.add('facts','parallax')
}
function coeur(){
    let id1 = document.getElementById('1')
    let id2 = document.getElementById('2')
    let id3 = document.getElementById('3')
    id1.classList.remove('filtreVitrine')
    id2.classList.add('filtreVitrine')
    id3.classList.add('filtreVitrine')
}

function promo(){
    let id1 = document.getElementById('1')
    let id2 = document.getElementById('2')
    let id3 = document.getElementById('3')
    id1.classList.add('filtreVitrine')
    id3.classList.add('filtreVitrine')
    id2.classList.remove('filtreVitrine')
    id2.classList.add('facts','parallax')
}
function fds(){
    let id1 = document.getElementById('1')
    let id2 = document.getElementById('2')
    let id3 = document.getElementById('3')
    id1.classList.add('filtreVitrine')
    id2.classList.add('filtreVitrine')
    id3.classList.remove('filtreVitrine')
}