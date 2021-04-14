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
        <iframe id="sc-widget" width="100%" height="100px" scrolling="no" frameBorder="no" src="`+this.path+`auto_play=false&hide_related=false&show_comments=false&show_user=false&show_reposts=false&show_teaser=true&visual=false"></iframe>
        `
        return code;
    }

    showBeat() {
        let beats = document.getElementById("beats");

        beats.insertAdjacentHTML("beforeend", `
        <tr>
            <td class="titlefield">` + this.title +`</td>
            <td>
                `+ this.beatsPlayer()+`
            </td>       
            <td>`+this.producer+`</td>
            <td>`+this.beatkey+`</td>
            <td>`+this.bpm+`</td>
            <td>`+this.price+`</td>
            <td class="add-cart" id="add-cart`+this.id+`">
                <a href="#" onclick="return false;"><i class="fas fa-cart-plus"></i> ADD TO CART</a>
                <input type="hidden" value="1">
            </td>
        </tr>
        `)
    }
}

let beats = [];
let products = [];

let ajax = new XMLHttpRequest();
let method = "GET";
let url = "./backend/api/beats/read.php";
let asynchronous = true;

ajax.open(method,url,asynchronous);
//sending ajax request
ajax.send();

/*let title = ["default"];
let id = ["0"];
let price = ["50"];*/

ajax.onreadystatechange = function () {
    let data;
    if (this.readyState == 4 && this.status == 200) {
        data = JSON.parse(this.responseText);
    }
    /*for (let i = 0; i < data.length; i++) {
        title[i] = data[i].title;
        id[i] = data[i].ID;
        price[i] = data[i].price;
    }*/

    //let carts = document.querySelectorAll(".add-cart");

    function loadBeat(id) {
        beats[id] = new Beat(data.beats[id].id, data.beats[id].title, data.beats[id].path, data.beats[id].link, data.beats[id].producer, data.beats[id].beatkey, data.beats[id].bpm, data.beats[id].price);
        beats[id].showBeat();
    }

    let id = 0;
    for (let i = 0; i<data.beats.length; i++) {
        loadBeat(id);
        id = id+1;
    }

    for (let i = 0; i<beats.length; i++) {
        products[i] =
            {
                name: beats[i].title,
                tag: beats[i].id,
                price: beats[i].price,
                inCart: 0
            }
    }
    let max = beats.length;
    let number = localStorage.getItem("cartNumbers");

    if (number != max) {
        for (let i=0; i<beats.length; i++) {
            let carts = document.getElementById("add-cart"+beats[i].id);
            carts.addEventListener("click", () => {
                cartNumbers(products[i]);
                total(products[i]);
            })
        }
    } else {
        for (let i=0; i<beats.length; i++) {
            let carts = document.getElementById("add-cart"+beats[i].id);
            carts.addEventListener("click", () => {
                alert("YOU ALREADY ALL BEATS TO YOUR CART!");
            })
        }
    }

    function onLoadCartNumbers() {
        let productNumbers = localStorage.getItem("cartNumbers");
        productNumbers = parseInt(productNumbers);
        if (productNumbers) {
            document.querySelector("#nav-cart span").textContent = "(" + (productNumbers) + ")";
        }
    }

    function cartNumbers(product) {
        let productNumbers = localStorage.getItem("cartNumbers");
        productNumbers = parseInt(productNumbers);

        if (productNumbers) {
            if (product.inCart != 1) {
                localStorage.setItem("cartNumbers", productNumbers+1);
                document.querySelector("#nav-cart span").textContent = "(" + (productNumbers+1) + ")";
            }
        } else {
            localStorage.setItem("cartNumbers", 1);
            document.querySelector("#nav-cart span").textContent = "(" + 1 + ")";
        }
        setItems(product);
    }

    function setItems(product) {
        let cartItems = localStorage.getItem("productsInCart");
        cartItems = JSON.parse(cartItems);

        if (cartItems != null) {
            if (cartItems[product.tag] == undefined) {
                cartItems = {
                    ...cartItems,
                    [product.tag]: product
                }
            }
            if (cartItems[product.tag].inCart == 1) {
                alert("YOU ALREADY ADDED THIS BEAT TO YOUR CART!");
            } else {
                cartItems[product.tag].inCart = 1;
            }
        } else {
            product.inCart = 1;
            cartItems = {
                [product.tag]: product
            };
        }
        localStorage.setItem("productsInCart", JSON.stringify(cartItems));
    }
    function total(product) {
        let price = product.price;
        let total = localStorage.getItem("total");
        let cartNumbers = localStorage.getItem("cartNumbers");

        if (total != null) {
            price = parseFloat(price);
            cartNumbers = parseInt(cartNumbers);
            localStorage.setItem("total", cartNumbers * price);
        } else {
            price = parseFloat(price);
            localStorage.setItem("total", price);
        }
    }

    onLoadCartNumbers();
}