const express = require('express');
const { sendMessage, getMessages, markAsRead } = require('../controllers/messageController');
const { protect } = require('../middleware/authMiddleware');

const router = express.Router();

// Rutas de mensajes
router.post('/', protect, sendMessage);
router.get('/:chatId', protect, getMessages);
router.put('/read', protect, markAsRead);

module.exports = router;
