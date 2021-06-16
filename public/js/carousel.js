window.onload = function carousel() {

    if (document.getElementById("message") != null) {
        let avis = document.getElementById("avis");
        let message = document.getElementById('message')
        avis.removeChild(message);
    }

    let avisNumber1 = Math.floor(Math.random() * messages.length);
    let avisNumber2 = Math.floor(Math.random() * messages.length);
    let avisNumber3 = Math.floor(Math.random() * messages.length);

    do{
        avisNumber1 = Math.floor(Math.random() * messages.length);
        avisNumber2 = Math.floor(Math.random() * messages.length);
        avisNumber3 = Math.floor(Math.random() * messages.length);
    }while(avisNumber1 === avisNumber2 | avisNumber1 === avisNumber3 || avisNumber2 === avisNumber3)


    let p = document.createElement('p');
    let h51 = document.createElement('h5');
    let newAvis = '';
    let newFirstName = '';
    let newLastName = '';

    let p2 = document.createElement('p');
    let h52 = document.createElement('h5')
    let newAvis2 = '';
    let newFirstName2 = '';
    let newLastName2 = '';

    let p3 = document.createElement('p');
    let h53 = document.createElement('h5')
    let newAvis3 = '';
    let newFirstName3 = '';
    let newLastName3 = '';

    for (let i = 0; i < messages.length; i++) {
        newAvis = messages[avisNumber1];
        newAvis2 = messages[avisNumber2];
        newAvis3 = messages[avisNumber3];
        newFirstName = firstName[avisNumber1]
        newFirstName2 = firstName[avisNumber2]
        newFirstName3 = firstName[avisNumber3]
        newLastName = lastName[avisNumber1]
        newLastName2 = lastName[avisNumber2]
        newLastName3 = lastName[avisNumber3]
    }

    h51.className = "name";
    p.innerHTML = newAvis;
    if (newLastName == null){
        newLastName = ''
    }
    h51.innerHTML = newFirstName + ' ' + newLastName;
    document.getElementById("pAvis").appendChild(p);
    document.getElementById('name').appendChild(h51);

    h52.className = "name";
    p2.innerHTML = newAvis2;
    if (newLastName2 == null){
        newLastName2 = ''
    }
    h52.innerHTML = newFirstName2 + ' ' + newLastName2
    document.getElementById("pAvis2").appendChild(p2);
    document.getElementById('name2').appendChild(h52);

    h53.className = "name";
    p3.innerHTML = newAvis3;
    if (newLastName3 == null){
        newLastName3 = ''
    }
    h53.innerHTML = newFirstName3 + ' ' + newLastName3
    document.getElementById("pAvis3").appendChild(p3);
    document.getElementById('name3').appendChild(h53);
}

function tous() {
    id1 = document.getElementById('1')
    id2 = document.getElementById('2')
    id3 = document.getElementById('3')
    idAll = [id1, id2, id3]
    idAll.forEach(function (id) {
        id.classList.remove('filtreVitrine')
        id2.classList = 'facts parallax'
    });
}
function coeur(){
    id1 = document.getElementById('1')
    id2 = document.getElementById('2')
    id3 = document.getElementById('3')
    id1.classList.remove('filtreVitrine')
    id2.classList = 'filtreVitrine'
    id3.classList = 'filtreVitrine'
}
function promo(){
    id1 = document.getElementById('1')
    id2 = document.getElementById('2')
    id3 = document.getElementById('3')
    id1.classList = 'filtreVitrine'
    id2.classList.remove('filtreVitrine')
    id2.classList = 'facts parallax'
    id3.classList = 'filtreVitrine'
}
function fds(){
    id1 = document.getElementById('1')
    id2 = document.getElementById('2')
    id3 = document.getElementById('3')
    id1.classList = 'filtreVitrine'
    id2.classList = 'filtreVitrine'
    id3.classList.remove('filtreVitrine')
}
