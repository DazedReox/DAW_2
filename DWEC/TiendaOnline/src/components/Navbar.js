import React from "react";
import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <nav className="navbar">
      <div className="navbar__brand">
        <Link to="/">Mi Tienda Online</Link>
      </div>
      <ul className="navbar__links">
        <li>
          <Link to="/categories">Categorías</Link>
        </li>
        <li>
          <Link to="/cart">Carrito</Link>
        </li>
      </ul>
    </nav>
  );
};

export default Navbar;
