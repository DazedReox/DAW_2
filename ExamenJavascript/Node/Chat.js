const ChatSchema = new mongoose.Schema({
    users: [{ type: mongoose.Schema.Types.ObjectId, ref: 'User' }],
    messages: [{ type: mongoose.Schema.Types.ObjectId, ref: 'Message' }],
    lastMessage: { type: mongoose.Schema.Types.ObjectId, ref: 'Message' },
    isGroup: { type: Boolean, default: false },
    groupName: { type: String, default: null },
    groupAdmin: { type: mongoose.Schema.Types.ObjectId, ref: 'User', default: null },
  }, { timestamps: true });
  
  module.exports = mongoose.model('Chat', ChatSchema);