const productSection = document.querySelector('.products');

const products = [
  {
    id: 1,
    image: "image/1.png",
    name: "Product 1",
    price: 29.99
  },
  {
    id: 2,
    image: "image/2.png",
    name: "Product 2",
    price: 49.99
  },
  {
    id: 3,
    image: "image/3.png",
    name: "Product 1",
    price: 29.99
  },
  {
    id: 4,
    image: "image/4.png",
    name: "Product 2",
    price: 49.99
  },
  {
    id: 5,
    image: "image/5.png",
    name: "Product 1",
    price: 29.99
  },
  {
    id: 6,
    image: "image/6.png",
    name: "Product 2",
    price: 49.99
  },
  {
    id: 7,
    image: "image/7.png",
    name: "Product 1",
    price: 29.99
  },
  {
    id: 8,
    image: "image/8.png",
    name: "Product 2",
    price: 49.99
  },
  {
    id: 9,
    image: "image/9.png",
    name: "Product 9",
    price: 19.99
  }
];

function createProductCard(product) {
  const productCard = document.createElement('div');
  productCard.classList.add('product');

  const productImage = document.createElement('img');
  productImage.src = product.image;
  productCard.appendChild(productImage);

  const productName = document.createElement('h2');
  productName.textContent = product.name;
  productCard.appendChild(productName);

  const productPrice = document.createElement('p');
  productPrice.textContent = `$${product.price}`;
  productCard.appendChild(productPrice);

  // Add a link to a product page or functionality here (optional)

  return productCard;
}

products.forEach(product => {
  const productCard = createProductCard(product);
  productSection.appendChild(productCard);
});
