import React from "react";
import ReactDOM from "react-dom";
import App from "./App";
import { CartProvider } from "./context/CartContext";
import { ProductProvider } from "./context/ProductContext";

ReactDOM.render(
  <ProductProvider>
    <CartProvider>
      <App />
    </CartProvider>
  </ProductProvider>,
  document.getElementById("root")
);
