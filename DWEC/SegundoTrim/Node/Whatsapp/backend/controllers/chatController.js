const Chat = require('../models/Chat');
const Message = require('../models/Message');
const User = require('../models/User');

// Crear o recuperar un chat entre dos usuarios
exports.accessChat = async (req, res) => {
  try {
    const { userId } = req.body;
    if (!userId) return res.status(400).json({ message: 'ID de usuario requerido' });
    
    let chat = await Chat.findOne({
      isGroup: false,
      users: { $all: [req.user.id, userId] },
    }).populate('users', '-password').populate('lastMessage');
    
    if (!chat) {
      chat = new Chat({ users: [req.user.id, userId] });
      await chat.save();
    }
    res.json(chat);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Obtener todos los chats del usuario autenticado
exports.getChats = async (req, res) => {
  try {
    const chats = await Chat.find({ users: req.user.id })
      .populate('users', '-password')
      .populate('lastMessage')
      .sort({ updatedAt: -1 });
    res.json(chats);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Crear un chat grupal
exports.createGroupChat = async (req, res) => {
  try {
    const { users, groupName } = req.body;
    if (!users || !groupName) return res.status(400).json({ message: 'Todos los campos son requeridos' });
    
    const chat = new Chat({ users: [...users, req.user.id], groupName, isGroup: true, groupAdmin: req.user.id });
    await chat.save();
    
    res.status(201).json(chat);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Agregar usuario a un chat grupal
exports.addToGroup = async (req, res) => {
  try {
    const { chatId, userId } = req.body;
    const chat = await Chat.findById(chatId);
    if (!chat || !chat.isGroup) return res.status(404).json({ message: 'Grupo no encontrado' });
    
    chat.users.push(userId);
    await chat.save();
    res.json(chat);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};
