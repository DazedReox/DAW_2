import { useState, useEffect } from 'react';
import io from 'socket.io-client';
import AvatarPicker from './components/AvatarPicker';
import Chat from './components/Chat';

const socket = io(import.meta.env.VITE_BACKEND_URL || 'http://localhost:3000');

function App() {
  const [user, setUser] = useState(null);

  return user ? (
    <Chat socket={socket} user={user} />
  ) : (
    <AvatarPicker onLogin={userData => {
      socket.emit("join", userData);
      setUser(userData);
    }} />
  );
}

export default App;