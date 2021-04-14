class Beat {
    constructor(id, title, path, link, producer, beatkey, bpm, price) {
        this.id = id;
        this.title = title;
        this.path = path;
        this.link = link;
        this.producer = producer;
        this.beatkey = beatkey;
        this.bpm = bpm;
        this.price = price;
    }

    beatsPlayer() {
        let code = `
        <iframe width="100%" height="100px" scrolling="no" frameBorder="no" src="`+this.path+`auto_play=false&hide_related=false&show_comments=false&show_user=false&show_reposts=false&show_teaser=true&visual=false"></iframe>
        `
        return code;
    }

    showBeat() {
        let beats = document.getElementById("beats");

        beats.insertAdjacentHTML("beforeend", ` 
        <tr>
            <td class="edit-button">
                <form method="post" action="./edit.php">
                    <input name="id" value="`+this.id+`" hidden>
                    <button id="edit"><i class="fas fa-edit"></i></button>
                </form>
            </td> 
            <td class="titlefield">` + this.title +`</td>
            <td>
                `+ this.beatsPlayer()+`
            </td>       
            <td>`+this.producer+`</td>
            <td>`+this.beatkey+`</td>
            <td>`+this.bpm+`</td>
            <td>`+this.price+`</td>
            <td class="delete">
                <a href="" onclick=deleteBeat(`+this.id+`)><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        `)
    }
}

let beats = [];

let ajax = new XMLHttpRequest();
let method = "GET";
let url = "./backend/api/beats/read.php";
let asynchronous = true;

ajax.open(method,url,asynchronous);
//sending ajax request
ajax.send();

ajax.onreadystatechange = function () {
    let data;
    if (this.readyState == 4 && this.status == 200) {
        data = JSON.parse(this.responseText);
    }

    function loadBeat(id) {
        beats[id] = new Beat(data.beats[id].id, data.beats[id].title, data.beats[id].path, data.beats[id].link, data.beats[id].producer, data.beats[id].beatkey, data.beats[id].bpm, data.beats[id].price);
        beats[id].showBeat();
    }

    let id = 0;
    for (let i = 0; i < data.beats.length; i++) {
        loadBeat(id);
        id = id + 1;
    }
}

function deleteBeat(id) {
    let deleteURL = "./backend/api/beats/delete.php/"+ id;
    let ajax = new XMLHttpRequest();
    ajax.open("DELETE",deleteURL,true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.location.reload(true);
            alert("SUCCESSFULLY DELETED!");
        }
    }
}

function updateBeat(id) {
    let newTitle = document.getElementById("newtitle").value;
    let editURL = "./backend/api/beats/update.php/"+ id + "/" + newTitle;
    let ajax = new XMLHttpRequest();
    ajax.open("PUT",editURL,true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            window.location.replace("/musicr/editbeats.php");
            alert("SUCCESSFULLY EDITED!");
        }
    }
}

function showDownload() {
    let id = JSON.parse(localStorage.getItem("productsInCart"));
    let amount = localStorage.getItem("cartNumbers");
    let tags = [];
    let links = "";
    for (let i = 0; i < amount; i++ ) {
        tags[i] = id[i+1].tag;
    }
    for (let j = 0; j < amount; j++) {
        let getURL = "./backend/api/beats/search.php/"+tags[j];
        let ajax = new XMLHttpRequest();
        ajax.open("GET",getURL,true);
        ajax.send();
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let data = JSON.parse(this.responseText);
                links += j + ": "+ data.link + "\n";
                if (j == amount-1) {
                    alert(links);
                    window.location.replace("/musicr");
                }
            }
        }
    }
}
