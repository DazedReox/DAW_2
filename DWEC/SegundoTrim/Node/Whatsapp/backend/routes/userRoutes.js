const express = require('express');
const { getAllUsers, getUserById, updateUserProfile, deleteUser } = require('../controllers/userController');
const { protect } = require('../middleware/authMiddleware');

const router = express.Router();

// Rutas de usuario
router.get('/', protect, getAllUsers);
router.get('/:id', protect, getUserById);
router.put('/update', protect, updateUserProfile);
router.delete('/delete', protect, deleteUser);

module.exports = router;
