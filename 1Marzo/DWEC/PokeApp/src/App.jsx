import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Landing from './pages/Landing';
import Pokemons from './pages/Pokemons';
import PokemonDetail from './components/PokemonDetail';
import Game from './components/Game';
import Navbar from './components/Navbar';
import NotFound from './components/NotFound';

const App = () => (
  <BrowserRouter>
    <Navbar />
    <Routes>
      <Route path="/" element={<Landing />} />
      <Route path="/pokemons" element={<Pokemons />} />
      <Route path="/detalle/:name" element={<PokemonDetail />} />
      <Route path="/play" element={<Game />} />
      <Route path="*" element={<NotFound />} />
    </Routes>
  </BrowserRouter>
);
export default App;