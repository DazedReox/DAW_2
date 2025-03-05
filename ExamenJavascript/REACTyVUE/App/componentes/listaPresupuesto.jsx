import React from "react";

const API = "https://jsonplaceholder.typicode.com/todos";
export const opciones = useState([]);

export const FormNombres = () => {

    fetch(API)
    .then(response => response.json())
    .data(data => opciones.push(data), slice(0, 9));
    
    useEffect(() => {
        fetch(API)
        .then(response => response.json())
        .data(data => opciones.push(data), slice(0, 9));
    });

    function Descripcion() {
        const [desc, setDesc] = useState(0);
      
        function handleClick() {
          setDesc(detalleReparacion);
        }
      
        return (
          <button onClick={handleClick}>
            Descripcion: {desc}
          </button>
        );
      }

      function Counter() {
        const [count, setCount] = useState(0);
      
        function handleClick() {
          setCount(count + 1);
        }
      
        return (
          <button onClick={handleClick}>
            Hoy tenemos {count} reparaciones nuevas
          </button>
        );
      }
      

    function Listado(){
        return(
            <div>
            <h1>Listado de los primeros 10</h1>
            <ul>
                {opciones.map(opcion => <li><button id={this.Counter} onClick={() => Descripcion(opcion.id)}>{opcion.name}</button></li>)}
            </ul>
        </div>
        )
    }
}