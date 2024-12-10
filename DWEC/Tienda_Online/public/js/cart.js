const cart = [];

//añadir prod
export const addToCart = (product) => {
  const existingProduct = cart.find((item) => item.id === product.id);

  if (existingProduct) {
    existingProduct.quantity += 1;
  } else {
    cart.push({ ...product, quantity: 1 });
  }

  console.log("Carrito actualizado:", cart);
};

//contenido carro
export const getCart = () => cart;

export const clearCart = () => {
  cart.length = 0;
};
