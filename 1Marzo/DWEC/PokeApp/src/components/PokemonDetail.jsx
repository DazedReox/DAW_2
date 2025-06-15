import { useParams } from 'react-router-dom';
import { useEffect, useState } from 'react';
import { fetchPokemonByName } from '../api/pokemonAPI';

const PokemonDetail = () => {
  const { name } = useParams();
  const [pokemon, setPokemon] = useState(null);

  useEffect(() => {
    fetchPokemonByName(name).then(setPokemon);
  }, [name]);

  if (!pokemon) return <p>Cargando...</p>;

  return (
    <div>
      <h2>{pokemon.name}</h2>
      <img src={pokemon.sprites.front_default} alt={pokemon.name} />
      <p>Peso: {pokemon.weight}</p>
      <p>Altura: {pokemon.height}</p>
      <p>Tipos: {pokemon.types.map(t => t.type.name).join(', ')}</p>
    </div>
  );
};
export default PokemonDetail;