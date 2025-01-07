const API_URL = "https://fakeapi.platzi.com/api/v1";

//prod
export const fetchProducts = async (offset = 0, limit = 10) => {
  try {
    const response = await fetch(`${API_URL}/products?offset=${offset}&limit=${limit}`);
    return await response.json();
  } catch (error) {
    console.error("Error al obtener productos:", error);
  }
};

//categorias
export const fetchCategories = async () => {
  try {
    const response = await fetch(`${API_URL}/categories`);
    return await response.json();
  } catch (error) {
    console.error("Error al obtener categorías:", error);
  }
};