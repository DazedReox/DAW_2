import axios from "axios";

const API_URL = "https://pokeapi.co/api/v2/pokemon";

export const getPokemons = async (limit = 20, offset = 0) => {
  try {
    const response = await axios.get(`${API_URL}?limit=${limit}&offset=${offset}`);
    return response.data.results;
  } catch (error) {
    console.error("Error fetching Pokemons:", error);
    return [];
  }
};

export const getPokemonById = async (id) => {
  try {
    const response = await axios.get(`${API_URL}/${id}`);
    return response.data;
  } catch (error) {
    console.error("Error fetching Pokemon details:", error);
    return null;
  }
};

export const searchPokemon = async (query) => {
  try {
    const response = await axios.get(`${API_URL}/${query.toLowerCase()}`);
    return response.data;
  } catch (error) {
    console.error("Pokemon not found:", error);
    return null;
  }
};
