import{userState} from 'react'
import {Login} from './Login.jsx';

function App(){
    var miDiv;
    var nombres = ["pepe", "raul", "carlos"];
    var miLista;
    for(i = 0; i<nombres.length;i++){

    }
    var loquesea=false;
    if(loquesea == true)
        miDiv = <div>loquesea es true</div>
    else
        miDiv = <div>loquesea es false</div>
    
    return(
        <>
            <Login></Login>
                <p>JOSE</p>
                <div>aksdjklasd</div>
                {miDiv}
            <Login></Login>
        </>
    )
}