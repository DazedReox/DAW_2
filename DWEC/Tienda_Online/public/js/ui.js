import { fetchProducts } from "./api.js";
import { addToCart } from "./cart.js";

const app = document.getElementById("app");

export const renderProducts = async () => {
  app.innerHTML = "<p>Cargando productos...</p>";

  const products = await fetchProducts();

  app.innerHTML = products
    .map(
      (product) => `
      <div class="product-card">
        <img src="${product.images[0]}" alt="${product.title}">
        <h3>${product.title}</h3>
        <p>$${product.price.toFixed(2)}</p>
        <button data-id="${product.id}" class="add-to-cart">Agregar al carrito</button>
      </div>
    `
    )
    .join("");

  //botones
  document.querySelectorAll(".add-to-cart").forEach((button) => {
    button.addEventListener("click", (event) => {
      const productId = event.target.dataset.id;
      const product = products.find((item) => item.id === productId);
      addToCart(product);
    });
  });
};
