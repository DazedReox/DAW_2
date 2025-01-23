import React from 'react';

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

export default App;