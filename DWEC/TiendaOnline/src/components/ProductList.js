import React, { useRef } from "react";
import ProductCard from "./ProductCard";

const ProductList = ({ products, loadMoreProducts, onAddToCart }) => {
  const loaderRef = useRef(null);

  const handleScroll = () => {
    const loader = loaderRef.current;
    if (loader && loader.getBoundingClientRect().top < window.innerHeight) {
      loadMoreProducts();
    }
  };

  React.useEffect(() => {
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <div className="product-list">
      {products.map((product) => (
        <ProductCard key={product.id} product={product} onAddToCart={onAddToCart} />
      ))}
      <div ref={loaderRef} className="product-list__loader">
        Cargando más productos...
      </div>
    </div>
  );
};

export default ProductList;