const User = require('../models/User');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const dotenv = require('dotenv');

dotenv.config();

// Registro de usuario
exports.register = async (req, res) => {
  try {
    const { name, email, password } = req.body;
    
    let user = await User.findOne({ email });
    if (user) return res.status(400).json({ message: 'El usuario ya existe' });
    
    user = new User({ name, email, password });
    await user.save();
    
    const token = user.generateAuthToken();
    res.status(201).json({ user, token });
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Inicio de sesión
exports.login = async (req, res) => {
  try {
    const { email, password } = req.body;
    
    const user = await User.findOne({ email });
    if (!user) return res.status(400).json({ message: 'Credenciales incorrectas' });
    
    const isMatch = await bcrypt.compare(password, user.password);
    if (!isMatch) return res.status(400).json({ message: 'Credenciales incorrectas' });
    
    const token = user.generateAuthToken();
    res.json({ user, token });
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};

// Obtener perfil del usuario autenticado
exports.getProfile = async (req, res) => {
  try {
    const user = await User.findById(req.user.id).select('-password');
    if (!user) return res.status(404).json({ message: 'Usuario no encontrado' });
    res.json(user);
  } catch (error) {
    res.status(500).json({ message: 'Error en el servidor', error });
  }
};
