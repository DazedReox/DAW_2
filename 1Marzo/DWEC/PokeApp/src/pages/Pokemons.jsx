import { useEffect, useState } from 'react';
import { fetchPokemons } from '../api/pokemonAPI';
import PokemonCard from '../components/PokemonCard';

const Pokemons = () => {
  const [pokemons, setPokemons] = useState([]);
  const [offset, setOffset] = useState(0);
  const [search, setSearch] = useState('');

  useEffect(() => {
    fetchPokemons(offset).then(setPokemons);
  }, [offset]);

  const handleSearch = (e) => setSearch(e.target.value.toLowerCase());

  return (
    <div>
      <input placeholder="Buscar Pokémon..." onChange={handleSearch} />
      <div className="grid">
        {pokemons
          .filter(p => p.name.includes(search))
          .map(p => <PokemonCard key={p.name} pokemon={p} />)}
      </div>
      <button onClick={() => setOffset(offset - 12)} disabled={offset === 0}>Anterior</button>
      <button onClick={() => setOffset(offset + 12)}>Siguiente</button>
    </div>
  );
};
export default Pokemons;