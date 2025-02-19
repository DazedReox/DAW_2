import React, { useState, useEffect } from "react";

const API = "https://jsonplaceholder.typicode.com/todos";

export const DefProyecto = () => {
  const [opciones, setOpciones] = useState([]);
  const [detalle, setDetalle] = useState(null);
  const [clickado, setClickado] = useState(null);

  useEffect(() => {
    fetch(API)
      .then(response => response.json())
      .then(data => setOpciones(data.slice(0, 10)))
      .catch(error => console.log("Error 404"));
  }, []);

  const handleClick = (id) => {
    fetch(`${API}/${id}`)
      .then(response => response.json())
      .then(data => setDetalle(data))
      .catch(error => console.log("Error 404"));
    setClickado(id);
  };

  return (
    <div>
      <h1>Primeras 10 opciones</h1>
      <ul>
        {opciones.map(opcion => (
          <li key={opcion.id}>
            <button onClick={() => handleClick(opcion.id)}>{opcion.title}</button>
          </li>
        ))}
      </ul>
      {detalle && (
        <div>
          <h2>Detalles</h2>
          <p>ID: {detalle.id}</p>
          <p>Título: {detalle.title}</p>
          <p>Completado: {detalle.completed ? "Sí" : "No"}</p>
          <p>User ID: {detalle.userId}</p>
        </div>
      )}
    </div>
  );
};
