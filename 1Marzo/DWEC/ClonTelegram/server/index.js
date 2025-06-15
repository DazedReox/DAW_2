const express = require('express');
const http = require('http');
const cors = require('cors');
const { Server } = require('socket.io');
const path = require('path');

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
  cors: {
    origin: '*'
  }
});

app.use('/avatars', express.static(path.join(__dirname, 'avatars')));

let users = [];

io.on('connection', (socket) => {
  socket.on('join', (user) => {
    socket.user = user;
    users.push({ id: socket.id, ...user });
    io.emit('users', users);
    socket.broadcast.emit('message', {
      system: true,
      text: `${user.name} ha entrado al chat`
    });

    socket.on('typing', (isTyping) => {
      socket.broadcast.emit('typing', {
        name: user.name,
        isTyping
      });
    });

    socket.on('chat', (text) => {
      io.emit('message', {
        name: user.name,
        text
      });
    });

    socket.on('disconnect', () => {
      users = users.filter(u => u.id !== socket.id);
      io.emit('users', users);
      socket.broadcast.emit('message', {
        system: true,
        text: `${user.name} ha salido del chat`
      });
    });
  });
});

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
