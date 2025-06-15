// src/components/PokemonCard.jsx
import { Link } from 'react-router-dom';

const PokemonCard = ({ pokemon }) => {
  if (!pokemon.url) return null;

  const id = pokemon.url.split('/').filter(Boolean).pop();
  const imageUrl = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${id}.png`;

  return (
    <div className="pokemon-card" style={{
        textAlign: 'center',
        background: 'white',
        padding: '1rem',
        borderRadius: '8px',
        boxShadow: '0 0 5px rgba(0,0,0,0.1)'}}>
      <h3 style={{ textTransform: 'capitalize' }}>{pokemon.name}</h3>
      <img src={imageUrl} alt={pokemon.name} width={96} height={96} />
      <br />
      <Link to={`/detalle/${pokemon.name}`}>Ver Detalles</Link>
    </div>
  );
};

export default PokemonCard;
