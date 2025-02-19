import { Routes, Route } from "react-router-dom";
import HomePage from "./pages/HomePage";
import PokemonDetail from "./pages/PokemonDetail";
import Navbar from "./components/Navbar";

function App() {
  return (
    <div className="bg-gray-100 min-h-screen">
      <Navbar />
      <Routes>
        <Route path="/" element={<HomePage />} />
        <Route path="/pokemon/:id" element={<PokemonDetail />} />
      </Routes>
    </div>
  );
}
