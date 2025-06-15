import { Link } from 'react-router-dom';

const Navbar = () => (
  <nav>
    <Link to="/">Inicio</Link>
    <Link to="/pokemons">Pokemons</Link>
    <Link to="/play">Jugar</Link>
  </nav>
);
export default Navbar;