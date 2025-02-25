const Message = require('../models/Message');
const Chat = require('../models/Chat');
const User = require('../models/User');

// Enviar un mensaje
exports.sendMessage = async (req, res) => {
  try {
    const { chatId, text, messageType, media } = req.body;
    if (!chatId || !text) return res.status(400).json({ message: 'Chat ID y texto son requeridos' });
    
    const message = new Message({ sender: req.user.id, chat: chatId, text, messageType, media });
    await message.save();
    
    await Chat.findByIdAndUpdate(chatId, { lastMessage: message._id });
    res.status(201).json(message);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Obtener todos los mensajes de un chat
exports.getMessages = async (req, res) => {
  try {
    const { chatId } = req.params;
    if (!chatId) return res.status(400).json({ message: 'Chat ID es requerido' });
    
    const messages = await Message.find({ chat: chatId }).populate('sender', 'name avatar');
    res.json(messages);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Marcar mensajes como leídos
exports.markAsRead = async (req, res) => {
  try {
    const { chatId } = req.body;
    await Message.updateMany({ chat: chatId, readBy: { $ne: req.user.id } }, { $addToSet: { readBy: req.user.id } });
    res.json({ message: 'Mensajes marcados como leídos' });
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};
