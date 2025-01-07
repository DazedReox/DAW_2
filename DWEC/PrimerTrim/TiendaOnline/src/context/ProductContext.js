import React, { createContext, useState, useEffect } from "react";

// Crear el contexto
export const ProductContext = createContext();

// Proveedor del contexto
export const ProductProvider = ({ children }) => {
  const [products, setProducts] = useState([]);
  const [categories, setCategories] = useState([]);
  const [loading, setLoading] = useState(false);

  // Cargar productos desde la API
  const fetchProducts = async (page = 1, limit = 10) => {
    setLoading(true);
    try {
      const response = await fetch(
        `https://fakeapi.platzi.com/api/v1/products?offset=${(page - 1) * limit}&limit=${limit}`
      );
      const data = await response.json();
      setProducts((prev) => [...prev, ...data]);
    } catch (error) {
      console.error("Error al cargar productos:", error);
    } finally {
      setLoading(false);
    }
  };

  // Cargar categorías desde la API
  const fetchCategories = async () => {
    try {
      const response = await fetch("https://fakeapi.platzi.com/api/v1/categories");
      const data = await response.json();
      setCategories(data);
    } catch (error) {
      console.error("Error al cargar categorías:", error);
    }
  };

  useEffect(() => {
    fetchCategories();
  }, []);

  return (
    <ProductContext.Provider value={{ products, categories, fetchProducts, loading }}>
      {children}
    </ProductContext.Provider>
  );
};
