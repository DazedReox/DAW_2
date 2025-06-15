import { useEffect, useState } from 'react';
import { fetchPokemons } from '../api/pokemonAPI';

const Game = () => {
  const [pokemon, setPokemon] = useState(null);
  const [guess, setGuess] = useState('');
  const [result, setResult] = useState('');

  useEffect(() => {
    fetchPokemons(Math.floor(Math.random() * 100)).then(p =>
      fetch(p[0].url).then(res => res.json()).then(setPokemon)
    );
  }, []);

  const checkGuess = () => {
    setResult(guess.toLowerCase() === pokemon.name ? '¡Correcto!' : 'Fallaste.');
  };

  if (!pokemon) return <p>Cargando...</p>;

  return (
    <div>
      <img style={{ filter: 'brightness(0)' }} src={pokemon.sprites.front_default} />
      <input value={guess} onChange={e => setGuess(e.target.value)} />
      <button onClick={checkGuess}>Adivinar</button>
      <p>{result}</p>
    </div>
  );
};
export default Game;