const productContainer = document.getElementById('app');

const fetchProducts = async () => {
  try {
    const response = await fetch('https://fakeapi.platzi.com/api/v1/products');
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    return await response.json();
  } catch (error) {
    console.error('Error al obtener los productos:', error);
    return [];
  }
};

const renderProducts = (products) => {
  if (products.length === 0) {
    productContainer.innerHTML = '<p>No se encontraron productos.</p>';
    return;
  }

  const productHTML = products
    .map(
      (product) => `
        <div class="product-card">
          <img src="${product.images[0]}" alt="${product.title}">
          <h3>${product.title}</h3>
          <p>Precio: $${product.price}</p>
          <button>Añadir al carrito</button>
        </div>
      `
    )
    .join('');

  productContainer.innerHTML = productHTML;
};

const initStore = async () => {
  const products = await fetchProducts();
  renderProducts(products);
};

initStore();
