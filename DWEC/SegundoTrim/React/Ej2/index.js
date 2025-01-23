/*function Form(){
    function enviarAlerta(e){
        e.preventDefault();
        console.log("Submit clickado");
        alert("Has clickad");
    }

    return(
        <form onSubmit={enviarAlerta}>
            <button type="submit">Click me</button>
        </form>
    );
}*/

class Pulsar extends React.component{
    constructor(props){
        super(props);
        this.state = {isToggle: true};

        this.handleClick = this.handleClick.bind(this);
    }
    
    handleClick(){
        this.setState(prevState => ({
            isToggleOn: !prevState.isToggleOn
        }));
    }
    render(){
        return(
            <button onClick={this.handleClick}>
                {this.state.isToggleOn ? 'On' : 'Off'}
            </button>
        );
    }
}