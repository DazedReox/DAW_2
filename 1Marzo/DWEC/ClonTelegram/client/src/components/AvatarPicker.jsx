import { useState } from 'react';

export default function AvatarPicker({ onLogin }) {
  const [name, setName] = useState('');
  const [status, setStatus] = useState('');
  const [avatar, setAvatar] = useState('avatar1.png');

  const avatars = ['avatar1.png', 'avatar2.png', 'avatar3.png'];

  return (
    <div style={{ padding: '2rem' }}>
      <h2>Iniciar sesión</h2>
      <input
        placeholder="Nombre"
        value={name}
        onChange={(e) => setName(e.target.value)}
      />
      <input
        placeholder="Estado"
        value={status}
        onChange={(e) => setStatus(e.target.value)}
      />
      <select onChange={(e) => setAvatar(e.target.value)} value={avatar}>
        {avatars.map((a) => (
          <option key={a} value={a}>{a}</option>
        ))}
      </select>
      <div>
        <img src={`/avatars/${avatar}`} alt="avatar" width={100} />
      </div>
      <button onClick={() => onLogin({ name, status, avatar })}>
        Entrar
      </button>
    </div>
  );
}
