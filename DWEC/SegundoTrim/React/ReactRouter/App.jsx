import { Route } from 'react-router-dom';
import { useState } from 'react';
import { Login } from './Login';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { RutasPrivadas } from './RutasPrivadas';
import { Link } from 'react-router-dom';

function App(){



    return(
        <>
            <BrowserRouter>
                <Link to="/inicio">Inicio</Link>
                <Link to="/login">Login</Link>
                <Link to="/recordatorios">Recordatorios</Link>

                <Routes>
                    <Route path="/login" element={<Login />} />
                    <Route element={<RutasPrivadas />}>
                        <Route path="/recordatorios" element={<Recordatorios />}></Route>
                        <Route path="/inicio" element={<Inicio />}></Route>
                    </Route>

                    <Route path="*" element={<Error404 />}></Route>
                </Routes>
            </BrowserRouter>
        </>
    )
}