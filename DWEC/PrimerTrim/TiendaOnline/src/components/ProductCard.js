import React from "react";

const ProductCard = ({ product, onAddToCart }) => {
  const { title, price, images } = product;

  return (
    <div className="product-card">
      <img src={images[0]} alt={title} className="product-card__image" />
      <div className="product-card__details">
        <h3 className="product-card__title">{title}</h3>
        <p className="product-card__price">${price.toFixed(2)}</p>
        <button className="product-card__button" onClick={() => onAddToCart(product)}>
          Agregar al carrito
        </button>
      </div>
    </div>
  );
};

export default ProductCard;
