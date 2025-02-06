/*import React from 'react';

function App() {
  const handleClick = () => {
    alert('Has pulsado');
  };

  return (
    <div>
      <button onClick={handleClick}>Clicka aqui</button>
    </div>
  );
}

export default App;**/

class Toggle extends React.Component {
  constructor(props) {
    super(props);
    this.state = {isToggleOn: true};

    // This binding is necessary to make `this` work in the callback    this.handleClick = this.handleClick.bind(this);  }

    handleClick(); {    
      this.setState(prevState => ({      
        isToggleOn: !prevState.isToggleOn    
      }));  
    }
    render(); {
      return (
        <button onClick={this.handleClick}>        {this.state.isToggleOn ? 'ON' : 'OFF'}
        </button>
      );
    }
  }
}