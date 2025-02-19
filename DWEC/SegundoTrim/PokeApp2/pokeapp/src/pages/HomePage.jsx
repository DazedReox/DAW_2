import { useEffect, useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";

const HomePage = () => {
  const [pokemons, setPokemons] = useState([]);

  useEffect(() => {
    axios.get("https://pokeapi.co/api/v2/pokemon?limit=20").then((res) => {
      setPokemons(res.data.results);
    });
  }, []);

  return (
    <div className="p-4">
      <h1 className="text-2xl font-bold mb-4">Lista de Pokémon</h1>
      <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
        {pokemons.map((pokemon, index) => (
          <Link key={index} to={`/pokemon/${index + 1}`} className="bg-white p-4 rounded shadow">
            {pokemon.name.toUpperCase()}
          </Link>
        ))}
      </div>
    </div>
  );
};