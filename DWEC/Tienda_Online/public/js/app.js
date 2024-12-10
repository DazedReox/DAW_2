import { renderProducts } from "./ui.js";

const initApp = () => {
  document.getElementById("view-products").addEventListener("click", (event) => {
    event.preventDefault();
    renderProducts();
  });

  renderProducts();
};

initApp();
