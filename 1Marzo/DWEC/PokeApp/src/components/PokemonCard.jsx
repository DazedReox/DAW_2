import { Link } from 'react-router-dom';

const PokemonCard = ({ pokemon }) => (
  <div className="pokemon-card">
    <h3>{pokemon.name}</h3>
    <Link to={`/detalle/${pokemon.name}`}>Ver Detalles</Link>
  </div>
);

export default PokemonCard;
