import {useState} from 'react';

export function Login(){
    var titulo="Titulo del componente estando en un archivo";
    var contenido;
    var estalogeado = falso;

    if(estalogeado){
        contenido = <h1>Nombre de Usuario</h1>
    }else{
        contenido = <button>Inicio de Sesion</button>

        return(
            <>
                <h1>{titulo}</h1>
                {contenido}
            </>
        )
    }
}