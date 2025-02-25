const jwt = require('jsonwebtoken');
const dotenv = require('dotenv');

dotenv.config();

// Generar un token JWT
const generateToken = (id) => {
  return jwt.sign({ id }, process.env.JWT_SECRET, {
    expiresIn: '30d',
  });
};

module.exports = generateToken;
