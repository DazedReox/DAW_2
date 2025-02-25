const User = require('../models/User');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');

// Obtener todos los usuarios excepto el usuario autenticado
exports.getAllUsers = async (req, res) => {
  try {
    const users = await User.find({ _id: { $ne: req.user.id } }).select('-password');
    res.json(users);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Obtener datos de un usuario por ID
exports.getUserById = async (req, res) => {
  try {
    const user = await User.findById(req.params.id).select('-password');
    if (!user) return res.status(404).json({ message: 'Usuario no encontrado' });
    res.json(user);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Actualizar perfil del usuario
exports.updateUserProfile = async (req, res) => {
  try {
    const { name, avatar, status } = req.body;
    const user = await User.findById(req.user.id);
    if (!user) return res.status(404).json({ message: 'Usuario no encontrado' });
    
    if (name) user.name = name;
    if (avatar) user.avatar = avatar;
    if (status) user.status = status;
    
    await user.save();
    res.json(user);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Eliminar usuario
exports.deleteUser = async (req, res) => {
  try {
    await User.findByIdAndDelete(req.user.id);
    res.json({ message: 'Cuenta eliminada correctamente' });
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};
