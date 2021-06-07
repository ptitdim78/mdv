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

    p.id = "message";
    h51.class = "name";
    p.innerHTML = newAvis;
    h51.innerHTML = newFirstName + ' ' + newLastName;
    document.getElementById("pAvis").appendChild(p);
    document.getElementById('name').appendChild(h51);

    p2.id = "message";
    h52.class = "name";
    p2.innerHTML = newAvis2;
    h52.innerHTML = newFirstName2 + ' ' + newLastName2
    document.getElementById("pAvis2").appendChild(p2);
    document.getElementById('name2').appendChild(h52);

    p3.id = "message";
    h53.class = "name";
    p3.innerHTML = newAvis3;
    h53.innerHTML = newFirstName3 + ' ' + newLastName3
    document.getElementById("pAvis3").appendChild(p3);
    document.getElementById('name3').appendChild(h53);
}
