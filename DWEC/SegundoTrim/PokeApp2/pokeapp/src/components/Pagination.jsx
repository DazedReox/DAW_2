const Pagination = ({ page, setPage }) => {
    return (
      <div className="flex justify-center mt-4">
        <button 
          onClick={() => setPage((prev) => Math.max(prev - 1, 1))} 
          className="px-4 py-2 bg-gray-300 rounded mx-2"
        >
          Anterior
        </button>
        <span className="px-4 py-2">Página {page}</span>
        <button 
          onClick={() => setPage((prev) => prev + 1)} 
          className="px-4 py-2 bg-gray-300 rounded mx-2"
        >
          Siguiente
        </button>
      </div>
    );
  };
  
  export default Pagination;
  