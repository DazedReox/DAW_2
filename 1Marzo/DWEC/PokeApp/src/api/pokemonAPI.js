export const fetchPokemons = async (offset = 0) => {
  const res = await fetch(`https://pokeapi.co/api/v2/pokemon?limit=12&offset=${offset}`);
  const data = await res.json();
  return data.results;
};

export const fetchPokemonByName = async (name) => {
  const res = await fetch(`https://pokeapi.co/api/v2/pokemon/${name}`);
  return res.json();
};