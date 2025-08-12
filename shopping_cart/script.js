let iconCart = document.querySelector('.icon-cart');
let closeCart = document.querySelector('.close');
let body = document.querySelector('body');
let listProductHTML = document.querySelector('.listProduct');
let listCartHTML = document.querySelector('.listCart');
let iconCartSpan = document.querySelector('.icon-cart span');

let listProducts = [];
let carts = [];

iconCart.addEventListener('click', () => {
  body.classList.toggle('showCart');
});

closeCart.addEventListener('click', () => {
  body.classList.toggle('showCart');
});

const addDataToHTML = () => {
  listProductHTML.innerHTML = '';
  if (listProducts.length > 0) {
    listProducts.forEach(product => {
      let newProduct = document.createElement('div');
      newProduct.classList.add('item');
      newProduct.dataset.id = product.id;
      newProduct.innerHTML = `
        <img src="<span class="math-inline">\{product\.image\}" alt\="\#"\>
<h2\></span>{product.name}</h2>
        <div class="price">$${product.price}</div>
        <button class="addCart">
          Add to Cart
        </button>
      `;
      listProductHTML.appendChild(newProduct);
    });
  }
};

listProductHTML.addEventListener('click', (event) => {
  let target = event.target;
  if (target.classList.contains('addCart')) {
    let productId = target.parentElement.dataset.id;
    addToCart(productId);
  }
});

const addToCart = (productId) => {
  let positionInCart = carts.findIndex((value) => value.product_id === productId); // Use === for strict comparison
  if (carts.length === 0) {
    carts = [{
      product_id: productId,
      quantity: 1
    }];
  } else if (positionInCart < 0) {
    carts.push({
      product_id: productId,
      quantity: 1
    });
  } else {
    carts[positionInCart].quantity = carts[positionInCart].quantity + 1;
  }
  addCartToHTML();
};

const addCartToHTML = () => {
  listCartHTML.innerHTML = '';
  let totalQuantity = 0;
  if (carts.length > 0) {
    carts.forEach(cart => {
      totalQuantity += cart.quantity;
      let newCart = document.createElement('div');
      newCart.classList.add('item');
      newCart.dataset.id = cart.product_id;

      let productIndex = listProducts.findIndex((value) => value.id === cart.product_id);
      let info = listProducts[productIndex];

      newCart.innerHTML = `
        <div class="image">
          <img src="${info.image}" alt="#">
        </div>
        <div class="name">
          ${info.name}
        </div>
        <div class="totalPrice">
          $<span class="math-inline">\{info\.price \* cart\.quantity\}
</div\>
<div class\="quantity"\>
<span class\="minus"\><</span\>
<span\></span>{cart.quantity}</span>
          <span class="plus">></span>
        </div>
      `;
      listCartHTML.appendChild(newCart);
    });
  }
  iconCartSpan.innerText = totalQuantity;
};

listCartHTML.addEventListener
