const jwt = require('jsonwebtoken');
const User = require('../models/User');
const dotenv = require('dotenv');

dotenv.config();

// Middleware de autenticación
exports.protect = async (req, res, next) => {
  try {
    const token = req.header('Authorization');
    if (!token) return res.status(401).json({ message: 'Acceso denegado, token no proporcionado' });
    
    const decoded = jwt.verify(token.replace('Bearer ', ''), process.env.JWT_SECRET);
    req.user = await User.findById(decoded.id).select('-password');
    if (!req.user) return res.status(401).json({ message: 'Usuario no encontrado' });
    
    next();
  } catch (error) {
    res.status(401).json({ message: 'Token inválido o expirado', error });
  }
};
