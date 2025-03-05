import React, { useState, useEffect } from "react";

const API = "https://jsonplaceholder.typicode.com/todos";
const [nombreUser] = useState([]);

export const FormNombres = () => {
    fetch(API)
    .then(response => response.json())
    .data(data => opciones.push(data), slice(0, 9));
    
    useEffect(() => {
        fetch(API)
        .then(response => response.json())
        .data(data => opciones.push(data), slice(0, 9));
    });

    function nombreUsuarios(){
        return(
            <select id="selectNombre" value={this.state.usuarios} onChange={this.handleChange} required>
                <option value={nombreUser.slice(0,1)}>{nombreUser.slice(0,1)}</option>
                <option value={nombreUser.slice(1,2)}>{nombreUser.slice(1,2)}</option>
                <option value={nombreUser.slice(2,3)}>{nombreUser.slice(2,3)}</option>
                <option value={nombreUser.slice(3,4)}>{nombreUser.slice(3,4)}</option>
                <option value={nombreUser.slice(4,5)}>{nombreUser.slice(4,5)}</option>
                <option value={nombreUser.slice(5,6)}>{nombreUser.slice(5,6)}</option>
                <option value={nombreUser.slice(6,7)}>{nombreUser.slice(6,7)}</option>
                <option value={nombreUser.slice(7,8)}>{nombreUser.slice(7,8)}</option>
                <option value={nombreUser.slice(8,9)}>{nombreUser.slice(8,9)}</option>
            </select>
        )
    }

class altaForm extends React.Component{

/**const root = ReactDOM.createRoot(
    document.getElementById("root")
);

const element = 
<form action="">
    <input type="text" name="Introduce la descripcion" required/>
    <br/>
    <select name="Electrodomestico" id="desplegable" required>
        <option value="Lavadora">Lavadora</option>
        <option value="Microondas">Microondas</option>
        <option value="Lavavajillas">Lavavajillas</option>
        <option value="Figorifico">Figorifico</option>
    </select>
    <input type="text" name="Nombre del dueño" required/>
    <input type="submit" name="Enviar"/>
</form>;
root.render(element);**/
    
    constructor(props) {
        super(props);
        this.state = {
            value: 'Selecciona un electrodomestico',
            usuarios: 'Elija una opción'
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }


    handleChange(event) {
        this.setState({value: event.target.value}); 
    }
    handleSubmit(event) {
        alert('A name was submitted: ' + this.state.value);
        event.preventDefault();
    }

    handleClick(event){
        alert('Enviado. ' + Date);
        event.preventDefault();
    }

    render(){
        <form onSubmit={this.handleSubmit}>
            <input type="text" id="desc" name="Introduce la descripcion" required/>
            <br/>
            <select id="desplegable" value={this.state.value} onChange={this.handleChange} required>
                <option value="Lavadora">Lavadora</option>
                <option value="Microondas">Microondas</option>
                <option value="Lavavajillas">Lavavajillas</option>
                <option value="Figorifico">Figorifico</option>
            </select>
            <nombreUsuarios />
        <input type="submit" name="Enviar" onClick={this.handleClick}/>
    </form>
    }
}
}