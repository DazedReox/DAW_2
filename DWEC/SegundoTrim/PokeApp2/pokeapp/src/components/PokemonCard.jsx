import { Link } from "react-router-dom";

const PokemonCard = ({ name, index }) => {
  return (
    <Link to={`/pokemon/${index + 1}`} className="bg-white p-4 rounded shadow text-center">
      <h2 className="text-lg font-bold">{name.toUpperCase()}</h2>
    </Link>
  );
};

export default PokemonCard;