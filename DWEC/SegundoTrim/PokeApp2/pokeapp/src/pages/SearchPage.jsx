import { useState } from "react";
import axios from "axios";
import PokemonCard from "../components/PokemonCard";

const SearchPage = () => {
  const [query, setQuery] = useState("");
  const [pokemon, setPokemon] = useState(null);

  const handleSearch = () => {
    axios.get(`https://pokeapi.co/api/v2/pokemon/${query.toLowerCase()}`)
      .then((res) => {
        setPokemon(res.data);
      })
      .catch(() => setPokemon(null));
  };

  return (
    <div className="p-4 text-center">
      <h1 className="text-2xl font-bold mb-4">Buscar Pokémon</h1>
      <input 
        type="text" 
        value={query} 
        onChange={(e) => setQuery(e.target.value)} 
        placeholder="Nombre o ID" 
        className="border p-2 rounded"
      />
      <button onClick={handleSearch} className="ml-2 p-2 bg-blue-500 text-white rounded">Buscar</button>
      {pokemon && <PokemonCard name={pokemon.name} index={pokemon.id} />}
    </div>
  );
};

export default SearchPage;