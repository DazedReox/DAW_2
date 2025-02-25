const { Server } = require('socket.io');

const initializeSocket = (server) => {
  const io = new Server(server, {
    cors: {
      origin: '*',
      methods: ['GET', 'POST'],
    },
  });

  io.on('connection', (socket) => {
    console.log('Nuevo cliente conectado:', socket.id);

    socket.on('joinChat', (chatId) => {
      socket.join(chatId);
      console.log(`Usuario unido al chat: ${chatId}`);
    });

    socket.on('sendMessage', (message) => {
      io.to(message.chat).emit('messageReceived', message);
    });

    socket.on('disconnect', () => {
      console.log('Cliente desconectado:', socket.id);
    });
  });

  return io;
};

module.exports = initializeSocket;
