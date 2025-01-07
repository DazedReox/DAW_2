import React from "react";

const Cart = ({ cartItems, onUpdateQuantity, onRemoveItem }) => {
  return (
    <div className="cart">
      {cartItems.length === 0 ? (
        <p>Tu carrito está vacío.</p>
      ) : (
        cartItems.map((item) => (
          <div key={item.id} className="cart-item">
            <img src={item.image} alt={item.title} className="cart-item__image" />
            <div className="cart-item__details">
              <h4>{item.title}</h4>
              <p>${item.price.toFixed(2)}</p>
              <div className="cart-item__actions">
                <button onClick={() => onUpdateQuantity(item.id, item.quantity - 1)}>-</button>
                <span>{item.quantity}</span>
                <button onClick={() => onUpdateQuantity(item.id, item.quantity + 1)}>+</button>
              </div>
              <button className="cart-item__remove" onClick={() => onRemoveItem(item.id)}>
                Eliminar
              </button>
            </div>
          </div>
        ))
      )}
    </div>
  );
};

export default Cart;
