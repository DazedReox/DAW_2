import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import axios from "axios";

const PokemonDetail = () => {
  const { id } = useParams();
  const [pokemon, setPokemon] = useState(null);

  useEffect(() => {
    axios.get(`https://pokeapi.co/api/v2/pokemon/${id}`).then((res) => {
      setPokemon(res.data);
    });
  }, [id]);

  if (!pokemon) return <div>Cargando...</div>;

  return (
    <div className="p-4">
      <h1 className="text-2xl font-bold">{pokemon.name.toUpperCase()}</h1>
      <img src={pokemon.sprites.front_default} alt={pokemon.name} className="w-32 h-32" />
      <p>Altura: {pokemon.height}</p>
      <p>Peso: {pokemon.weight}</p>
    </div>
  );
};

export default PokemonDetail;
