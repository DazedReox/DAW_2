import { Navigate, Outlet} from "react-router-dom";

export function RutasPrivadas() {

    let auth = true; //Aqui añadiremos la logica de autenticacion

    return(
        auth ? <Outlet />: <Navigate to="/"/>
    )
}