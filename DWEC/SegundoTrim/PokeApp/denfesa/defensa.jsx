import React, { useState, useEffect } from "react";
import { Detalles } from "./Detalles";

const API = "https://jsonplaceholder.typicode.com/todos";
const opciones = useState([]);
const detalle = useState([]);
const clickado = useState();


export const DefProyecto = () => {
    fetch(API)
    .then(response => response.json())
    .data(data => opciones.push(data), slice(0, 10))
    .catch(error => console.log("error 404"));

    
    useEffect(() => {
        fetch(API)
        .then(response => response.json())
        .data(data => opciones.push(data), slice(0, 10))
        .catch(error => console.log("error 404"));
    });

    /*const handleClick = (id) => {
        fetch("https://jsonplaceholder.typicode.com/todos/id")
        .then(response => response.json())
        .data(data => detalle.push(data))
        .catch(error => console.log("error 404"));
    }*/

    function Detalles(id){
        return (
            <div>
                <h1>Detalles</h1>
                <li>{detalle.title}</li>
                <li>{detalle.completed}</li>
                <li>{detalle.userId}</li>
                <li>{detalle.id}</li>
            </div>
        )
    };
        

};
return (
    <div>
        <h1>Primeras 10 opciones</h1>
        <ul>
            {opciones.map(opcion => <li><button onClick={() => clickado(opcion.id)}>{opcion.title}</button></li>)}
        </ul>
        <ul>
            {clickado && <Detalles id={clickado} />}
        </ul>
    </div>
)

