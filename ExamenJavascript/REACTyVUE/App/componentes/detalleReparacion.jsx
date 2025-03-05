import React from 'react';
import { Route } from 'react-router-dom';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { Link } from 'react-router-dom';

function DetallesReparaciones(){
    return(
        <form>
            <p id="desc"></p>
            <button id="edit">Editar</button>
            <button id="delete">Borrar</button>
            <input type="checkbox" name="Completado: "/>
        </form>
        
    )
}



function Atras(){
    return(
        <>
            <BrowserRouter>
                <Link to="/altaPresupuesto">Alta de Presupuesto</Link>
                <Link to="/listaPresupuesto">Lista de Presupuesto</Link>

                <Routes>
                    <Route path="/altaPresupuesto" element={<altaPresupuesto />} />
                    <Route path="/listaPresupuesto" element={<listaPresupuesto />} />

                    <Route path="*" element={<Error404 />}></Route>
                </Routes>
            </BrowserRouter>
        </>
    )
}