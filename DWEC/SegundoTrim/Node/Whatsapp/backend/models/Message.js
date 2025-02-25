const MessageSchema = new mongoose.Schema({
    sender: { type: mongoose.Schema.Types.ObjectId, ref: 'User', required: true },
    chat: { type: mongoose.Schema.Types.ObjectId, ref: 'Chat', required: true },
    text: { type: String, required: true },
    media: { type: String, default: null },
    readBy: [{ type: mongoose.Schema.Types.ObjectId, ref: 'User' }],
    messageType: { type: String, enum: ['text', 'image', 'video', 'audio', 'file'], default: 'text' },
  }, { timestamps: true });
  
  module.exports = mongoose.model('Message', MessageSchema);