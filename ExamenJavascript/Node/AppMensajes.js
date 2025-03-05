const Chat = require('./Chat');
const Message = require('./Message');

exports.accessChat = async (req, res) => {
  try {
    let chat = await Chat.findOne({
      users: { $all: [userId] },
    }).populate('lastMessage');
    
    res.json(chat);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

exports.sendMessage = async (req, res) => {
  try {
    const message = new Message({ sender: usuario, chat: chatId, text, messageType, media });
    await message.save();
    
    await Chat.findByIdAndUpdate(chatId, { lastMessage: message._id });
    res.status(201).json(message);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};
