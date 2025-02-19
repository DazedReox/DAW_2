import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <nav className="bg-red-500 p-4 text-white flex justify-between">
      <Link to="/" className="text-lg font-bold">PokéApp</Link>
    </nav>
  );
};