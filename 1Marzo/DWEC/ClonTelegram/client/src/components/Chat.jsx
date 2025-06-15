import { useEffect, useState } from 'react';

export default function Chat({ socket, user }) {
  const [users, setUsers] = useState([]);
  const [messages, setMessages] = useState([]);
  const [typing, setTyping] = useState(null);
  const [input, setInput] = useState('');

  useEffect(() => {
    socket.on('users', setUsers);
    socket.on('message', (msg) => {
      setMessages((prev) => [...prev, msg]);
    });
    socket.on('typing', ({ name, isTyping }) => {
      setTyping(isTyping ? name : null);
    });
  }, [socket]);

  const handleSend = () => {
    if (input.trim()) {
      socket.emit('chat', input);
      setInput('');
    }
  };

  return (
    <div className="chat-container">
      <div className="user-list">
        <h3>Usuarios conectados</h3>
        {users.map((u) => (
          <div key={u.id}>
            <img src={`/avatars/${u.avatar}`} alt="avatar" width={30} style={{ verticalAlign: 'middle' }} />
            <strong style={{ marginLeft: '0.5rem' }}>{u.name}</strong>
            <p style={{ margin: 0, fontSize: '0.8rem' }}>{u.status}</p>
          </div>
        ))}
      </div>

      <div className="chat-window">
        <div className="chat-messages">
          {messages.map((m, i) => (
            <div key={i}>
              {m.system ? (
                <em>{m.text}</em>
              ) : (
                <strong>{m.name}:</strong>
              )}
              {!m.system && ` ${m.text}`}
            </div>
          ))}
        </div>

        {typing && <div><em>{typing} está escribiendo...</em></div>}

        <div className="chat-input">
          <input
            value={input}
            onChange={(e) => {
              setInput(e.target.value);
              socket.emit('typing', e.target.value.length > 0);
            }}
            onKeyDown={(e) => e.key === 'Enter' && handleSend()}
            placeholder="Escribe un mensaje..."
            style={{ flex: 1 }}
          />
          <button onClick={handleSend}>Enviar</button>
        </div>
      </div>
    </div>
  );
}
