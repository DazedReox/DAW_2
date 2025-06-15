import { useEffect, useState } from 'react';

const Play = () => {
  const [pokemon, setPokemon] = useState(null);
  const [guess, setGuess] = useState('');
  const [message, setMessage] = useState('');

  const getRandomPokemon = async () => {
    const id = Math.floor(Math.random() * 151) + 1; // Gen 1
    const res = await fetch(`https://pokeapi.co/api/v2/pokemon/${id}`);
    const data = await res.json();
    setPokemon(data);
    setGuess('');
    setMessage('');
  };

  useEffect(() => {
    getRandomPokemon();
  }, []);

  const handleGuess = () => {
    if (guess.toLowerCase() === pokemon.name.toLowerCase()) {
      setMessage('¡Correcto!');
    } else {
      setMessage(`Incorrecto. Era ${pokemon.name}`);
    }
    setTimeout(getRandomPokemon, 2000);
  };

  if (!pokemon) return <p>Cargando...</p>;

  return (
    <div>
      <h2>¿Quién es este Pokémon?</h2>
      <img src={pokemon.sprites.front_default} alt="pokemon" style={{ filter: 'brightness(0)' }} />
      <input value={guess} onChange={(e) => setGuess(e.target.value)} />
      <button onClick={handleGuess}>Adivinar</button>
      <p>{message}</p>
    </div>
  );
};

export default Play;