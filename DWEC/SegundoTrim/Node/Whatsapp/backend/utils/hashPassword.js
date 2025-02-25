const bcrypt = require('bcryptjs');

// Función para hashear contraseñas
const hashPassword = async (password) => {
  const salt = await bcrypt.genSalt(10);
  return await bcrypt.hash(password, salt);
};

module.exports = hashPassword;