function displayCart() {
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);

    let productsContainer = document.querySelector(".products");
    if (cartItems && productsContainer) {
            Object.values(cartItems).map(item => {
                productsContainer.insertAdjacentHTML("beforeend",
                    `
                        <div class="product">
                            <a onclick="deletefromCart(${item.tag})"><i class="far fa-times-circle"></i></a>
                            <span id="product-title">${item.name}</span>
                            <div id="product-price">${item.price}€</div>
                        <div id="product-quantity">
                            <span> ${item.inCart} </span>
                        </div>
                        <div class="total" id="product-total">${item.inCart * item.price}€</div> 
                        </div>
                `);
            });
        }
}
function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem("cartNumbers");
    productNumbers = parseInt(productNumbers);
    if (productNumbers) {
        document.querySelector("#nav-cart span").textContent = "(" + (productNumbers) + ")";
    }
    let total = localStorage.getItem("total");
    if (total) {
        let cartTotal = document.getElementById("cart-total");
        cartTotal.innerText = total + "€";
    } else {
        let newContent = document.getElementById("info");
        newContent.innerHTML = `<h5 id="infotext">YOUR CART IS EMPTY.</h5>`;
    }
}

function deletefromCart(id) {
    let cartItems = JSON.parse(localStorage.getItem("productsInCart"));
    let productNumbers = localStorage.getItem("cartNumbers");
    productNumbers = parseInt(productNumbers);
    let total = localStorage.getItem("total");
    total = parseFloat(total);
    let deleted;
    for (let x in cartItems) {
        if(x == id){
            total = total - cartItems[id].price;
            delete cartItems[id];
            productNumbers--;
            break;
        }
    }
    deleted = JSON.stringify(cartItems);
    if (total == 0) {
        localStorage.removeItem("total");
        localStorage.removeItem("cartNumbers");
        localStorage.removeItem("productsInCart");
    } else {
        localStorage.setItem('cartNumbers', productNumbers);
        localStorage.setItem('total', total);
        localStorage.setItem('productsInCart', deleted);
    }
    window.location.reload();
}

onLoadCartNumbers();
displayCart();